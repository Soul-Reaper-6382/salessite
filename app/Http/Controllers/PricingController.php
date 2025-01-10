<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Plan;
use App\Models\Home_Text;
use App\Models\Home_Text2;
use App\Models\Circle_Text;
use App\Models\Home_Videos;
use App\Models\Home_Images;
use App\Models\Graphic_Text;
use App\Models\Home_Steps;
use App\Models\About_Us;
use App\Models\Integrations;
use App\Models\Calc_Text;
use App\Models\Journey;
use App\Models\Integrations_Cat;
use App\Models\Testimonial;
use App\Models\Subscription;
use App\Models\Subscription_Item;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;

class PricingController extends Controller
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

   
    public function pricing()
    {
        $plan_db = getPlans();
        $textSettings = Home_Text::first();
        $home_text2 = Home_Text2::first();
        $circleTextSettings = Circle_Text::first();
         $videoSettings = Home_Videos::first();
        $images = Home_Images::orderBy('reorder', 'asc')->get();
        $steps = Home_Steps::all();
        $integrations = Integrations::orderBy('id', 'desc')->limit(12)->get();

        $testimonials = Testimonial::all();
        $graphic_text = Graphic_Text::first();
        $calcSettings = Calc_Text::first();
        
        return view('pricing', compact('plan_db','textSettings','home_text2','circleTextSettings','videoSettings','images','steps','integrations','testimonials','graphic_text','calcSettings'));
        
    }

    public function all_integration()
    {
        $circleTextSettings = Circle_Text::first();
        $categories  = Integrations_Cat::with('integrations')->get();

        return view('all_integration', compact('circleTextSettings','categories'));
         
        }

    
}
