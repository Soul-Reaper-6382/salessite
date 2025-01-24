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


class DashboardStateController extends Controller
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

   public function statefetch_func(Request $request)
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

    public function stateget_change(Request $request)
    {
        $stateGetVal = $request->stateget_val;

        // Call the helper function
        $result = getStoresByState($stateGetVal);

        // Prepare the response
        return response()->json([
            'stores' => $result['stores'],
            'userstores' => $result['userStores']
        ]);
        // return response()->json($result);
    }
    

}
