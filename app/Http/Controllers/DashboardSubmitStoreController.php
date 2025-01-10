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


class DashboardSubmitStoreController extends Controller
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


    public function submit_store_info(Request $request)
    {
        $user = Auth::user();
        $plan = Plan::find($request->plan_id);

        $end_date = Carbon::now()->addMonths(2)->format('Y-m-d'); // Format as YYYY-MM-DD
        $is_trial = true;
        $plan_name = $plan->name;
        $formatted_plan_name = strtolower($plan_name);

        // Prepare data for both API calls
        $dataOnboarding = prepareDataForOnboarding($request, $user, $plan, $formatted_plan_name, $is_trial);
        $dataSubscription = prepareDataForSubscription($formatted_plan_name, $end_date, $is_trial, $user, $plan);

        
        $apiUrlOnboard = env('API_Smugglers_URL') . 'api/store/public/onboarding/';
        $apiUrlStoreSubscriptionPlans = env('API_Smugglers_URL') . 'api/store/private/store-subscription-plans/';

         // Make the API calls
        $responseBodyOnboarding = makeApiCall($apiUrlOnboard, $dataOnboarding);
        $responseBodySubscription = makeApiCall($apiUrlStoreSubscriptionPlans, $dataSubscription);

        
            // Process responses or handle errors accordingly
            if (!$responseBodyOnboarding || !$responseBodySubscription) {
                return redirect()->back()->with('error', 'Error submitting store info.');
            }


        $user->fname = $request->first_name;
        $user->lname = $request->last_name;
        $user->trial_ends_at = $end_date;
        $user->status = 1;
        $user->save();

        UserDetail::updateOrCreate(
            ['user_id' => $user->id],
            [
                'lic_no' => $request->License_old,
                'store_name' => $request->store_name,
                'entity_name' => $request->entity_name,
                'store_address' => $request->store_address,
                'store_city' => $request->store_city,
                'store_county' => $request->store_county,
                'store_state' => $request->store_state,
                'plan_id' => $request->plan_id,
            ]
        );

        
        session()->flash('message', 'Account Created Successfully!');
        return redirect('/card_details');
    }

    

}
