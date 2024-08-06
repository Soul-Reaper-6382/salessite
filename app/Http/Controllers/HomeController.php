<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Plan;
use App\Models\Home_Text;
use App\Models\Home_Text2;
use App\Models\Circle_Text;
use App\Models\Home_Videos;
use App\Models\Home_Images;
use App\Models\Home_Steps;
use Illuminate\Validation\Rule;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    

    public function index()
    {
        // Auth()->logout();
        // return view('home');
        $plan_db = Plan::orderBy('id', 'ASC')->get();
        $textSettings = Home_Text::first();
        $home_text2 = Home_Text2::first();
        $circleTextSettings = Circle_Text::first();
         $videoSettings = Home_Videos::first();
        $images = Home_Images::all();
        $steps = Home_Steps::all();
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));

         // Fetch Stripe customer details
        $stripeCustomer = null;
        $paymentMethods = [];
        $subscription = null;

        
         return view('home', compact('plan_db','textSettings','home_text2','circleTextSettings','videoSettings','images','steps'));
        }

   

}
