<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Plan;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Mail;
use PhpOffice\PhpSpreadsheet\IOFactory;
use GuzzleHttp\Client;

class RegisterStoreController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('guest');
    }

   public function registerstore(Request $request){
        $request->validate([
                'username' => [
                    'required', 
                    'string',
                    'regex:/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d).*$/', // Requires at least one uppercase letter, one lowercase letter, and one number
                    'min:5', // Minimum length of 5 characters
                    'max:20', // Maximum length of 20 characters
                    'unique:users,username' // Username must be unique in the users table
                ],
                'phone_number' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'email_confirmation' => ['required', 'same:email'],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
            ], [
                // Custom error message for the regex rule on username
                'username.regex' => 'The username must contain at least one uppercase letter, one lowercase letter, and one number.',
                // You can add other custom messages if needed
            ]);
        $leadDetails = [
            'email' => $request['email'],
            'firstname' => '',
            'lastname' => '',
            'phone' => $request['phone'],
            'state' => '',
            'store_license' => '',
            'store_name' => '',
            'lifecyclestage' => 'lead',
        ];
        $plan = getPlanByPriceId($request['stripe_plan']);
        $LeadId = null;

        $result = storeNewLead($leadDetails);

        if (isset($result['status']) && $result['status'] === 'success') {
            $LeadId = $result['id'];
        } elseif (
            isset($result['status'], $result['category'], $result['message']) &&
            $result['status'] === 'error' &&
            $result['category'] === 'CONFLICT'
        ) {
            preg_match('/Existing ID: (\d+)/', $result['message'], $matches);
            if (!empty($matches[1])) {
                $LeadId = $matches[1];
            }
        }

        
        $user = User::create([
            'username' => $request['username'],
            'phone' => $request['phone_number'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'password_apo' => $request['password'],
            'plan_id' => $plan->id,
            'lead_id' => $LeadId,
            'roles' => $request['roles'],
        ]);

        $user->roles()->attach($request['roles']);

        auth()->login($user);
        // session()->flash('message', 'Registration Successfully!');
        return redirect('/dashboard');
    }



   }

