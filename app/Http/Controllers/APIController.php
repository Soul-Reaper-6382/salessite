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

class APIController extends Controller
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
        $newPlan = getPlanByNameAndDuration($plan_name, $plan_duration);
        $existPlan = getUserPlanDetails($user->plan_id);

        if (!$newPlan) {
            return response()->json(['message' => 'Plan not found.'], 404);
        }

        if (!$user->stripe_id) {
            return response()->json(['message' => 'User does not have a Stripe ID or not added a card'], 404);
        } else {
            
            // Retrieve the user's current subscription
            $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
            $subscriptions = $stripe->subscriptions->all(['customer' => $user->stripe_id]);
            $currentSubscription = !empty($subscriptions->data) ? $subscriptions->data[0] : null;
            $planStatus = $currentSubscription ? $currentSubscription->status : 'Trial';

            if ($currentSubscription && $currentSubscription->status === 'active') {
                $planHierarchy = ['Start', 'Manage', 'Own', 'Grow']; // Define plan hierarchy in ascending order
                $currentPlanIndex = array_search($existPlan->name, $planHierarchy); // Get current plan index
                $newPlanIndex = array_search($plan_name, $planHierarchy); // Get new plan index
                if ($newPlanIndex <= $currentPlanIndex) {
                    return response()->json(['message' => "Downgrade not allowed. Currently subscribed to a higher plan."], 403);
                }
                if($plan_name == $existPlan->name && $plan_duration == $existPlan->duration){
                        return response()->json(['message' => "Currently subscribed to this plan"], 200);
                }
                
                $updatedSubscription = $stripe->subscriptions->update($currentSubscription->id, [
                'items' => [
                    [
                        'id' => $currentSubscription->items->data[0]->id,
                        'price' => $newPlan->stripe_plan, // New plan price ID
                    ],
                ],
                'proration_behavior' => 'create_prorations', // Optional: handle proration if needed
                ]);

                // Update the local database subscription record
                Subscription::where('stripe_id', $currentSubscription->id)->update([
                    'stripe_status' => $updatedSubscription->status,
                    'stripe_price' => $newPlan->stripe_plan,
                    'ends_at' => $updatedSubscription->current_period_end,
                ]);

                $user->plan_id = $newPlan->id;
                $user->save();

                // Call the external API
                $formatted_plan_name = strtolower($newPlan->name);
                $is_trial = false;
                $dataSubscription = prepareDataForSubscription($formatted_plan_name, null, $is_trial, $user, $newPlan);

                $apiUrlStoreSubscriptionPlans = env('API_Smugglers_URL') . 'api/store/private/store-subscription-plans/';

                 // Make the API calls
                $responseBodySubscription = makeApiCall($apiUrlStoreSubscriptionPlans, $dataSubscription);

            } else {
                // Update the subscription to the new plan without charging during the trial
                $updatedSubscription = $stripe->subscriptions->update($currentSubscription->id, [
                    'items' => [
                        [
                            'id' => $currentSubscription->items->data[0]->id,
                            'price' => $newPlan->stripe_plan, // New plan price ID
                        ],
                    ],
                    'proration_behavior' => 'none', // No immediate charge during trial
                ]);

                // Update the local database subscription record
                Subscription::where('stripe_id', $currentSubscription->id)->update([
                    'stripe_status' => $updatedSubscription->status,
                    'stripe_price' => $newPlan->stripe_plan,
                    'ends_at' => $currentSubscription->trial_end,
                ]);

                $trialExpiryDate = $currentSubscription->trial_end 
                ? \Carbon\Carbon::createFromTimestamp($currentSubscription->trial_end)->format('Y-m-d') 
                : null;

                $user->plan_id = $newPlan->id;
                $user->trial_ends_at = $trialExpiryDate;
                $user->save();

                // Call the external API
                $formatted_plan_name = strtolower($newPlan->name);
                $is_trial = true;
                $dataSubscription = prepareDataForSubscription($formatted_plan_name, $trialExpiryDate, $is_trial, $user, $newPlan);

                $apiUrlStoreSubscriptionPlans = env('API_Smugglers_URL') . 'api/store/private/store-subscription-plans/';

                 // Make the API calls
                $responseBodySubscription = makeApiCall($apiUrlStoreSubscriptionPlans, $dataSubscription);

            }

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

}
