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


class SetPlanTrailController extends Controller
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

    
    public function starting_plan_view()
    {
        $plan_db = Plan::where('price', '!=', 0)->orderBy('id', 'ASC')->get();
        return view('starting_plan', ['plan_db'=>$plan_db]);
    }

    public function starting_plan_set(Request $request)
    {
        $user = Auth::user();
        $newPlanId = $request->input('plan_id');
       
        $user->plan_id = $newPlanId;
        $user->save();

        $newPlan = getUserPlanDetails($newPlanId);
        $formatted_plan_name = strtolower($newPlan->name);
        $end_date = ($user->trial_ends_at)->format('Y-m-d');
        $is_trial = true;

        $dataSubscription = prepareDataForSubscription($formatted_plan_name, $end_date, $is_trial, $user, $newPlan);

        $apiUrlStoreSubscriptionPlans = env('API_Smugglers_URL') . 'api/store/private/store-subscription-plans/';

         // Make the API calls
        $responseBodySubscription = makeApiCall($apiUrlStoreSubscriptionPlans, $dataSubscription);

        
            // Process responses or handle errors accordingly
            if (!$responseBodySubscription) {
                return redirect()->back()->with('error', 'Error submitting Api.');
            }

         
            return response()->json(['success' => true, 'message' => 'Plan updated successfully.']);
               
    }
    
}
