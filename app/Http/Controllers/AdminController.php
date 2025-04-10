<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;


class AdminController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function index()
    {
        $user_count = User::where('id', '!=' ,12)->count();
        $user_trial = User::where('stripe_id', null)->where('id', '!=' ,12)->count();
        $user_subscription = User::where('stripe_id', '!=', null)->where('id', '!=' ,12)->count();
        $user_register_lic = UserDetail::where('lic_no','!=',null)->count();
        $licenses = UserDetail::paginate(10); // Adjust the number of items per page
        return view('admin.home', compact('user_count','user_trial','user_subscription','user_register_lic','licenses'));
        // return view('admin.home');
    }

    public function admin_myaccount(){
        return view('admin.admin_myaccount');
    }

    public function allusers(){
        $all_user = User::with('UserDetail')->where('id', '!=' ,12)->get();
        return view('admin.allusers', compact('all_user'));
    }

     public function delete_user($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->roles()->detach();
            $user->delete();
            return back()->with('message', 'User deleted successfully!');
        }
        return back()->with('message', 'User not found!');
    }

    public function updateaccount(Request $request)
    {
            # Validation
            $request->validate([
                'fname' => ['required'],
                'lname' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')->ignore(auth()->user()->id)],
            ]);


            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'email' => $request->email,
            ]);

            return back()->with("message", "Account Detail Update successfully!");
    }

    public function admin_changepassword(){
            return view('admin.admin_changepassword');
        }

        public function admin_update_password(Request $request)
    {
            # Validation
            $request->validate([
                'old_password' => 'required',
                'new_password' => 'required|confirmed|string|min:8',
            ]);


            #Match The Old Password
            if(!Hash::check($request->old_password, auth()->user()->password)){
                return back()->with("error", "Old Password Doesn't match!");
            }


            #Update the new Password
            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->new_password),
                'password_apo' => $request->new_password
            ]);

            return back()->with("message", "Password changed successfully!");
    }

    public function downloadAllCsv()
    {
        // Fetch all data from the database
        $data = UserDetail::all();

        // Define the CSV header
        $csvHeader = ['lic_no']; // Adjust as needed
        
        // Create a file pointer
        $file = fopen('php://output', 'w');
        
        // Add the CSV header to the file
        fputcsv($file, $csvHeader);
        
        // Add data rows to the CSV file
        foreach ($data as $row) {
            fputcsv($file, [$row->lic_no]); // Adjust as needed
        }
        
        // Set headers to download the file
        $response = Response::stream(function() use ($file) {
            fclose($file);
        }, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="all_licenses.csv"',
        ]);

        return $response;
    }
   


}
