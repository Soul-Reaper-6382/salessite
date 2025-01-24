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

class HomeStateController extends Controller
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

   
    public function stateget_change_home(Request $request)
    {
        $stateGetVal = $request->stateget_val;

        // Call the helper function
        $result = getStoresByState($stateGetVal);

        // Prepare the response
        return response()->json([
            'stores' => $result['stores'],
            'userstores' => $result['userStores']
        ]);
    }

    public function statefetch_func_home(Request $request)
    {
         // Call the StateFetchDropdown helper function
        $states = StateFetchDropdown();

        // Check if the API call was successful
        if ($states === null) {
            return response()->json(['error' => 'Failed to fetch states.'], 500);
        }

        // Return the data or process it as needed
        return response()->json(['response' => $states]);
    }
   
    
}
