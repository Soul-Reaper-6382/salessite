<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterStoreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\Auth\RegisterController;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Log;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/clear_all', function(){
            Artisan::call('cache:clear');
            Artisan::call('config:clear');
            Artisan::call('route:clear');
            Artisan::call('view:clear');
                    return response()->json(['message' => 'Application cleared']);
});
Route::group(['middleware'=>['auth','roles:admin']],function(){ 
Route::get('/admin', [AdminController::class,'index']);
Route::get('/admin_myaccount', [AdminController::class,'admin_myaccount']);
Route::post('/update-account', [AdminController::class, 'updateaccount']);
Route::get('/admin_changepassword', [AdminController::class,'admin_changepassword']);
Route::post('/admin_update-password', [AdminController::class,'admin_update_password']);
Route::get('/download-all-csv', [AdminController::class, 'downloadAllCsv'])->name('licenses.downloadAllCsv');

Route::get('/text_setting', [HomePageController::class, 'text_setting_view']);
Route::get('/graphic_textsetting', [HomePageController::class, 'graphic_text_setting_view']);
Route::get('/videos_setting', [HomePageController::class, 'videos_setting_view']);
Route::get('/images_setting', [HomePageController::class, 'images_setting_view']);
Route::post('/update-image-order', [HomePageController::class, 'updateImageOrder'])->name('update_image_order');
Route::post('/update_graphic_settings', [HomePageController::class, 'update_graphic_settings']);
Route::get('/integration_images', [HomePageController::class, 'integration_images_view']);
Route::get('/steps_setting', [HomePageController::class, 'steps_setting_view'])->name('steps_setting');;
Route::post('update_text_settings', [HomePageController::class, 'update_text_settings'])->name('update_text_settings');
Route::post('update_home_text2', [HomePageController::class, 'update_home_text2'])->name('update_home_text2');
Route::post('update_circle_text_settings', [HomePageController::class, 'update_circle_text_settings'])->name('update_circle_text_settings');
Route::post('update_video_settings', [HomePageController::class, 'update_video_settings'])->name('update_video_settings');
Route::post('/add_integration_images', [HomePageController::class, 'add_integration_images'])->name('add_integration_images');
Route::post('/add_category', [HomePageController::class, 'addCategory'])->name('add_category');
Route::delete('/delete_category/{id}', [HomePageController::class, 'deleteCategory'])->name('delete_category');
Route::delete('/delete_integration/{id}', [HomePageController::class, 'deleteIntegration'])->name('delete_integration');
// Route to fetch images based on category
Route::get('/category_images/{id}', [HomePageController::class, 'getCategoryImages'])->name('category_images');

Route::get('/edit_category/{id}', [HomePageController::class, 'editCategory'])->name('edit_category');
Route::post('/update_category/{id}', [HomePageController::class, 'updateCategory'])->name('update_category');
// Fetch data to edit image
Route::get('/edit_image/{id}', [HomePageController::class, 'editImage'])->name('edit_image');

// Update the image
Route::put('/update_image/{id}', [HomePageController::class, 'updateImage'])->name('update_image');


Route::delete('/delete_integration_images/{id}', [HomePageController::class, 'delete_integration_images'])->name('delete_integration_images');
Route::post('/add_image_settings', [HomePageController::class, 'add_image_settings'])->name('add_image_settings');
Route::post('/add_step_settings', [HomePageController::class, 'add_step_settings'])->name('add_step_settings');
Route::delete('/delete_image_settings/{id}', [HomePageController::class, 'delete_image_settings'])->name('delete_image_settings');
Route::get('/edit_step/{id}', [HomePageController::class, 'edit_step'])->name('edit_step');
Route::post('/update_step/{id}', [HomePageController::class, 'update_step'])->name('update_step');
Route::delete('/delete_step/{id}', [HomePageController::class, 'delete_step'])->name('delete_step');

Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials.index');
Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('testimonials.create');
Route::post('/testimonials/store', [TestimonialController::class, 'store'])->name('testimonials.store');
Route::get('/testimonials/edit/{id}', [TestimonialController::class, 'edit'])->name('testimonials.edit');
Route::post('/testimonials/update/{id}', [TestimonialController::class, 'update'])->name('testimonials.update');
Route::delete('/testimonials/delete/{id}', [TestimonialController::class, 'destroy'])->name('testimonials.destroy');

});
Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [HomeController::class,'index']);
Route::get('/pricing', [HomeController::class,'pricing']);
Route::get('/about-us', [HomeController::class,'aboutus']);
Route::get('/all_integration', [HomeController::class,'all_integration']);
Route::post('/statefetch_func_home', [HomeController::class,'statefetch_func_home']);
Route::post('/stateget_change_home', [HomeController::class,'stateget_change_home']);
Route::post('/registerstore', [RegisterStoreController::class, 'registerstore']);

Route::post('/lead_storehubspot', function (Request $request) {
    // dd($request->email);
    try {

        $licenseNumber = $request->store_license;
        $statefetch = $request->statefetch;
        $storeName = $request->store_name;
        if (empty($licenseNumber) || empty($statefetch) || empty($storeName)) {
        }
        else{
        $path = public_path('Retail Package Store Licenses.xlsx');
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
        $worksheet = $spreadsheet->getActiveSheet();
        $licenseValid = false;
        $storeData = [];

         foreach ($worksheet->getRowIterator() as $row) {
            $cellIterator = $row->getCellIterator();
            $cellIterator->setIterateOnlyExistingCells(false);
            $data = [];
            foreach ($cellIterator as $cell) {
                $data[] = $cell->getValue();
            }
        if (($licenseNumber && $data[0] === $licenseNumber) || ($storeName && $data[2] === $storeName)) {
                $licenseValid = true;
                $storeData = [
                    'entity_name' => $data[1],
                    'store_name' => $data[2],
                    'store_address' => $data[3],
                    'city' => $data[4],
                    'country' => $data[5],
                    'state' => $data[6],
                    'phone' => $data[7],
                ];

                if ($statefetch != $storeData['state']) {
                return response()->json(['message' => 'notmatch']);
                }
                break;
            }
        }

        if (!$licenseValid || $statefetch != $storeData['state']) {
            $error_license = 'notmatch';
            return response()->json(['message' => 'notmatch']);
        }

    }
   
        // Collect lead data
         $leadData = [
            'properties' => [
                'email'     => $request->input('email'),
                'firstname' => $request->input('first_name'),
                'lastname'  => $request->input('last_name'),
                'phone'     => $request->input('phone_number'),
                'state'   => $request->input('statefetch'),       // Added State
                'store_license' => $request->input('store_license'),    // Added Store License
                'store_name'   => $request->input('store_name'),       // Added Store Name
            ],
        ];


        // API URL
        $url = 'https://api.hubapi.com/crm/v3/objects/contacts';
        
        // Send request with Guzzle
        $client = new Client();
        $response = $client->post($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . env('HUBSPOT_ACCESS_TOKEN'),
                'Content-Type'  => 'application/json',
            ],
            'json' => $leadData,
        ]);

        return response()->json(['message' => 'Lead submitted successfully']);
    } catch (RequestException $e) {
        // Handle error and display response from HubSpot
        if ($e->hasResponse()) {
            $response = $e->getResponse();
            $message = json_decode($response->getBody()->getContents(), true);
            return response()->json(['error' => $message], $response->getStatusCode());
        }
        return response()->json(['error' => 'An error occurred while submitting the lead'], 500);
    }
})->name('lead.store');



Route::group(['middleware'=>['auth','roles:user']],function(){ 
Route::get('/dashboard', [DashboardController::class,'index']);
Route::get('/card_details', [DashboardController::class,'card_details']);
Route::get('/billing_history', [DashboardController::class,'billing_history_view']);
Route::get('/payment_method', [DashboardController::class,'payment_method_view']);
Route::get('/monthly_yearly', [DashboardController::class,'monthly_yearly_view']);
Route::get('/change_plan', [DashboardController::class,'change_plan_view']);
Route::get('/starting_plan', [DashboardController::class,'starting_plan_view']);
Route::post('/starting_plan_set', [DashboardController::class,'starting_plan_set'])->name('starting_plan_set');
Route::get('/change_password', [DashboardController::class, 'changepassword']);
Route::get('/add_a_card', [DashboardController::class, 'make_payment']);
Route::post('/update-password', [DashboardController::class, 'updatePassword']);
Route::post('/change-plan', [DashboardController::class, 'changePlan'])->name('change_plan');

Route::post('/submit_checkstore_license', [DashboardController::class,'submit_checkstore_license']);
Route::post('/stateget_change', [DashboardController::class,'stateget_change']);
Route::post('/submit_store_info', [DashboardController::class,'submit_store_info']);
Route::post('/update_make_payment', [DashboardController::class,'update_make_payment']);
Route::post('/update_card_detail', [DashboardController::class,'update_card_detail']);
Route::post('/statefetch_func', [DashboardController::class,'statefetch_func']);


});
Route::get('/register/{token}', [RegisterController::class, 'showRegistrationForm'])->name('register');
Auth::routes([]);