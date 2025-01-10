<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserDetail;
use App\Models\Plan;
use App\Models\Subscription;
use App\Models\Subscription_Item;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use PhpOffice\PhpSpreadsheet\IOFactory;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;


class ActiveChangePlanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    
    public function changePlan(Request $request)
    {
        $user = Auth::user();
        $newPlanId = $request->input('plan_id');
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        
        $newPlan = getPlanByPriceId($newPlanId);
        if (!$newPlan) {
            return response()->json(['error' => 'Plan not found.'], 404);
        }

        $subscription = null;

        if ($user->stripe_id) {
            // Retrieve Stripe customer subscriptions
            $subscriptions = $stripe->subscriptions->all(['customer' => $user->stripe_id]);
            $currentSubscription = !empty($subscriptions->data) ? $subscriptions->data[0] : null;

            if ($currentSubscription) {

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
            } else {
                // // Create a new subscription if none exists
                // $subscription = $stripe->subscriptions->create([
                //     'customer' => $user->stripe_id,
                //     'items' => [['price' => $newPlan->stripe_plan]],
                // ]);

                // // Create Subscription record
                // $subscriptionModel = Subscription::create([
                //     'user_id' => $user->id,
                //     'stripe_id' => $subscription->id,
                //     'stripe_status' => $subscription->status,
                //     'stripe_price' => $newPlan->stripe_plan,
                //     'quantity' => 1, // Adjust quantity if needed
                //     'ends_at' => $subscription->current_period_end,
                // ]);
                // // Create or update Subscription_Item record
                // Subscription_Item::create([
                //     'subscription_id' => $subscriptionModel->id,
                //     'stripe_id' => $subscription->items->data[0]->id,
                //     'stripe_product' => $subscription->items->data[0]->price->product,
                //     'stripe_price' => $subscription->items->data[0]->price->id,
                //     'quantity' => 1, // Adjust quantity if needed
                // ]);
            }
       
         $end_date = null;
         $is_trial = false;
         $plan_name = $newPlan->name;
         $formatted_plan_name = strtolower($plan_name);

        $user->plan_id = $newPlan->id;
        $user->save();

        $dataSubscription = prepareDataForSubscription($formatted_plan_name, $end_date, $is_trial, $user, $newPlan);

        $apiUrlStoreSubscriptionPlans = env('API_Smugglers_URL') . 'api/store/private/store-subscription-plans/';

         // Make the API calls
        $responseBodySubscription = makeApiCall($apiUrlStoreSubscriptionPlans, $dataSubscription);

        
            // Process responses or handle errors accordingly
            if (!$responseBodySubscription) {
                return redirect()->back()->with('error', 'Error submitting Api.');
            }
              


            return response()->json(['success' => 'Plan changed successfully.']);
        }

        return response()->json(['error' => 'User does not have a Stripe ID.'], 400);
    }

    

   

}
