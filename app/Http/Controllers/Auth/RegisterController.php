<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Plan;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    protected $redirectTo = '/dashboard';
    // 'admin' => '/admin',
    // 'user' => '/home',
   public function redirectTo()
    {
        //$rollen = Auth()->user();
        $redirects = [
    'admin' => '/admin',
    'user' => '/dashboard',
        ];

        $roles = Auth()->user()->roles->map->name;

        foreach ($redirects as $role => $url) {
            if ($roles->contains($role)) {
                return $url;
            }
        }
        return '/login';
         
    } 

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'fname' => ['required'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'roles' => ['required'],
            'cardnumber' => ['required','string','min:19','max:19'],
            'cdmonth' => ['required','string','min:2','max:2'],
            'cdyear' => ['required','string','min:2','max:2'],
            'cdcvv' => ['required','string','min:3','max:4'],
            'g-recaptcha-response' => ['required'],
            'privacy_policy' => ['accepted'],
            'terms_and_conditions' => ['accepted'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'roles' => $data['roles'],
            'cardnumber' => Crypt::encryptString($data['cardnumber']),
            'cdmonth' => $data['cdmonth'],
            'cdyear' => $data['cdyear'],
            'cdcvv' => Crypt::encryptString($data['cdcvv']),
        ]);
        $user->roles()->attach($data['roles']);
        return $user;

    }

    // Add the following method to retrieve and pass $eula to the registration view
    protected function showRegistrationForm($token = null)
    {

        // Determine the correct Stripe plan column based on the environment variable
        $stripePlanColumn = env('Stripe_Plan') === 'test' ? 'stripe_plan_test' : 'stripe_plan';

        // If no token is provided
        if (!$token) {
            // Find the default plan (e.g., 'Start') with a non-zero price and monthly duration
            $plan = Plan::where('name', 'Manage')
                ->where('price', '!=', 0)
                ->where('duration', 'monthly')
                ->first([$stripePlanColumn]);

            if ($plan) {
                // Redirect to the register page with the fetched stripe plan
                return redirect('/register/' . $plan->$stripePlanColumn);
            } else {
                // Handle the case where no matching plan is found
                return redirect('/home'); // Redirect to home page or any other route
            }
        }

        // If a token is provided, find the corresponding plan
        $plan = Plan::where($stripePlanColumn, $token)->first();

        if (!$plan) {
            // Redirect to home if the plan doesn't exist
            return redirect('/home');
        }

        // Pass the Stripe plan and all plans to the view
        $stripe_plan = $token;
        return view('auth.register', compact('stripe_plan'));
    }
}
