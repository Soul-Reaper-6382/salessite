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
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'email_confirmation' => ['required', 'same:email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $plan = Plan::where('stripe_plan', $request['stripe_plan'])
               ->first(['id']);
        $user = User::create([
            'username' => $request['username'],
            'phone' => $request['phone_number'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'password_apo' => $request['password'],
            'plan_id' => $plan->id,
            'roles' => $request['roles'],
        ]);

        $user->roles()->attach($request['roles']);

        auth()->login($user);
        // session()->flash('message', 'Registration Successfully!');
        return redirect('/dashboard');
    }



   }

