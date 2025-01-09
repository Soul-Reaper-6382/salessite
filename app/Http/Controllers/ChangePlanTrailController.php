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


class ChangePlanTrailController extends Controller
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

    
    
    public function changePlanTrailing(Request $request)
    {
        $user = Auth::user();
        $newPlanId = $request->input('plan_id');

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $stripePlanColumn = env('Stripe_Plan') === 'test' ? 'stripe_plan_test' : 'stripe_plan';

        // Retrieve new plan details from the database
        $newPlan = Plan::where($stripePlanColumn, $newPlanId)->select('id', 'name', 'slug', $stripePlanColumn . ' as stripe_plan', 'price', 'description', 'duration', 'plan')
                     ->first();

        if (!$newPlan) {
            return response()->json(['success' => false, 'error' => 'Plan not found.'], 404);
        }

        if (!$user->stripe_id) {
            return response()->json(['success' => false, 'error' => 'User is not a Stripe customer.'], 400);
        }

        // Retrieve the user's current subscription
        $subscriptions = $stripe->subscriptions->all(['customer' => $user->stripe_id]);
        $currentSubscription = !empty($subscriptions->data) ? $subscriptions->data[0] : null;

        if ($currentSubscription) {
            // Check if the user is still in the trial period
            $isInTrial = $currentSubscription->trial_end && $currentSubscription->trial_end > time();

            if ($isInTrial) {
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
                $client = new \GuzzleHttp\Client();
                $apiUrlStoreSubscriptionPlans = env('API_Smugglers_URL') . 'api/store/private/store-subscription-plans/';
                $apiToken = env('API_Smugglers_Authorization');

                $secondData = [
                    'subscription_plan' => strtolower($newPlan->name),
                    'trial_expiry_date' => $trialExpiryDate,
                    'is_trial' => true,
                    'source_object_id' => $user->source_object_id,
                    'billing_frequency' => $newPlan->duration,
                ];

                try {
                    $secondResponse = $client->post($apiUrlStoreSubscriptionPlans, [
                        'json' => $secondData,
                        'headers' => [
                            'Authorization' => $apiToken,
                        ],
                    ]);

                    return response()->json(['success' => true, 'message' => 'Plan updated successfully.']);
                } catch (\GuzzleHttp\Exception\ClientException $e) {
                    $errorResponse = $e->getResponse();
                    $errorBody = $errorResponse ? json_decode($errorResponse->getBody()->getContents(), true) : [];
                    $validationErrors = $errorBody['message']['errors'] ?? ['An unknown error occurred.'];

                    return response()->json(['success' => false, 'errors' => $validationErrors], 422);
                } catch (\Exception $e) {
                    return response()->json(['success' => false, 'error' => 'Error communicating with API: ' . $e->getMessage()], 500);
                }
            } else {
                return response()->json(['success' => false, 'error' => 'User is no longer in the trial period.'], 400);
            }
        } else {
            return response()->json(['success' => false, 'error' => 'No active subscription found.'], 404);
        }
    }




    

   

}
