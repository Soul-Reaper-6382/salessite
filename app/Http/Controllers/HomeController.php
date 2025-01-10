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

    
    public function upd_plan_api(Request $request){
        $validator = Validator::make($request->all(), [
            'source_object_id' => 'required|string',
            'plan_name' => 'required|string',
            'plan_duration' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $plan_name = $request->plan_name;
        $plan_duration = $request->plan_duration;
        $source_object_id_get = $request->source_object_id;

        // Check if the source_object_id exists in the users table
        $user = User::where('source_object_id', $source_object_id_get)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        // Check if the plan_name exists in the plan table
        $newPlan = Plan::where('name', $plan_name)->where('price', '!=', 0)->where('duration', $plan_duration)->first();

        if (!$newPlan) {
            return response()->json(['message' => 'Plan not found.'], 404);
        }

        if (!$user->stripe_id) {
            return response()->json(['message' => 'User does not have a Stripe ID or not added a card'], 404);
        } else {
            // Retrieve Stripe customer subscriptions
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $subscriptions = $stripe->subscriptions->all(['customer' => $user->stripe_id]);
            $currentSubscription = !empty($subscriptions->data) ? $subscriptions->data[0] : null;
            if ($currentSubscription) {

                $stripe->subscriptions->update($currentSubscription->id, [
                    'cancel_at_period_end' => true,
                ]);

                // Update the local subscription status to 'canceled'
                Subscription::where('stripe_id', $currentSubscription->id)->update([
                    'stripe_status' => 'canceled',
                    'ends_at' => $currentSubscription->current_period_end,
                ]);
                // Update the subscription to the new plan
                $subscription = $stripe->subscriptions->update($currentSubscription->id, [
                    'items' => [['price' => $newPlan->stripe_plan]],
                    'prorate' => true,
                ]);

                $subscription = $stripe->subscriptions->create([
                    'customer' => $user->stripe_id,
                    'items' => [['price' => $newPlan->stripe_plan]],
                ]);

                // Create Subscription record
                $subscriptionModel = Subscription::create([
                    'user_id' => $user->id,
                    'stripe_id' => $subscription->id,
                    'stripe_status' => $subscription->status,
                    'stripe_price' => $newPlan->stripe_plan,
                    'quantity' => 1, // Adjust quantity if needed
                    'ends_at' => $subscription->current_period_end,
                ]);

                // Create or update Subscription_Item record
                Subscription_Item::create([
                    'subscription_id' => $subscriptionModel->id,
                    'stripe_id' => $subscription->items->data[0]->id,
                    'stripe_product' => $subscription->items->data[0]->price->product,
                    'stripe_price' => $subscription->items->data[0]->price->id,
                    'quantity' => 1, // Adjust quantity if needed
                ]);
            }
            else {
                // Create a new subscription if none exists
                $subscription = $stripe->subscriptions->create([
                    'customer' => $user->stripe_id,
                    'items' => [['price' => $newPlan->stripe_plan]],
                ]);

                // Create Subscription record
                $subscriptionModel = Subscription::create([
                    'user_id' => $user->id,
                    'stripe_id' => $subscription->id,
                    'stripe_status' => $subscription->status,
                    'stripe_price' => $newPlan->stripe_plan,
                    'quantity' => 1, // Adjust quantity if needed
                    'ends_at' => $subscription->current_period_end,
                ]);
                // Create or update Subscription_Item record
                Subscription_Item::create([
                    'subscription_id' => $subscriptionModel->id,
                    'stripe_id' => $subscription->items->data[0]->id,
                    'stripe_product' => $subscription->items->data[0]->price->product,
                    'stripe_price' => $subscription->items->data[0]->price->id,
                    'quantity' => 1, // Adjust quantity if needed
                ]);
            }

            // Update plan in the local database
            $user->plan_id = $newPlan->id;
            $user->save();

            return response()->json(['message' => 'Plan changed successfully.'], 200);
        }


    }

    public function upd_licnum_api(Request $request){
        $validator = Validator::make($request->all(), [
            'license_number' => 'required|string|max:255',
            'source_object_id' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $license_number_get = $request->license_number;
        $source_object_id_get = $request->source_object_id;

        // Check if the source_object_id exists in the users table
        $user = User::where('source_object_id', $source_object_id_get)->first();

        if (!$user) {
            return response()->json(['message' => 'User not found.'], 404);
        }

        // Update the UserDetail table with the new license number
        $userDetail = UserDetail::where('user_id', $user->id)->first();

        if ($userDetail) {
            $userDetail->lic_no = $license_number_get;
            $userDetail->save();

            return response()->json(['message' => 'License number updated successfully.'], 200);
        } else {
            return response()->json(['message' => 'User detail not found.'], 404);
        }


    }

    

    public function index()
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

            return view('home', compact('plan_db','textSettings','home_text2','circleTextSettings','videoSettings','images','steps','integrations','testimonials','graphic_text'));
         
        }

   

}
