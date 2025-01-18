<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeStateController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterStoreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardStateController;
use App\Http\Controllers\DashboardSubmitStoreController;
use App\Http\Controllers\TrialCardDetailController;
use App\Http\Controllers\DashboardBillingController;
use App\Http\Controllers\SetPlanTrailController;
use App\Http\Controllers\CardDetailController;
use App\Http\Controllers\ChangePlanTrailController;
use App\Http\Controllers\UpdateMakePaymentController;
use App\Http\Controllers\ActiveChangePlanController;
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

// Admin Routes
Route::group(['middleware'=>['auth','roles:admin']],function(){ 
Route::get('/admin', [AdminController::class,'index']);
Route::get('/admin_myaccount', [AdminController::class,'admin_myaccount']);
Route::post('/update-account', [AdminController::class, 'updateaccount']);
Route::get('/admin_changepassword', [AdminController::class,'admin_changepassword']);
Route::post('/admin_update-password', [AdminController::class,'admin_update_password']);
Route::get('/download-all-csv', [AdminController::class, 'downloadAllCsv'])->name('licenses.downloadAllCsv');

Route::get('/price_setting', [HomePageController::class, 'price_setting_view'])->name('price_setting');
Route::get('/edit_pricing/{id}/{duration}', [HomePageController::class, 'editPricing'])->name('edit_pricing');
Route::put('/update_pricing/{id}', [HomePageController::class, 'updatePricing'])->name('update_pricing');
// Plan key routes
Route::post('/plan/{id}/add_key', [HomePageController::class, 'addKey'])->name('add_key');
Route::delete('/plan/{id}/delete_key/{key_id}', [HomePageController::class, 'deleteKey'])->name('delete_key');
Route::put('/plan/{id}/update_key/{key_id}', [HomePageController::class, 'updateKey'])->name('update_key');

Route::get('/about_setting', [HomePageController::class, 'about_setting_view'])->name('about_setting');
Route::post('/update_about_settings', [HomePageController::class, 'update_about_settings'])->name('update_about_settings');


Route::get('/journey_setting', [HomePageController::class, 'journey_setting_view'])->name('journey_setting_view');
Route::post('/add_journey_settings', [HomePageController::class, 'journey_store'])->name('add_journey_settings');
Route::get('/journey_setting/{id}/edit', [HomePageController::class, 'journey_edit'])->name('edit_journey');
Route::put('/journey_setting/{id}', [HomePageController::class, 'journey_update'])->name('update_journey');
Route::delete('/journey_setting/{id}', [HomePageController::class, 'journey_destroy'])->name('delete_journey');

Route::get('/text_setting', [HomePageController::class, 'text_setting_view']);
Route::get('/calculator_setting', [HomePageController::class, 'calculator_setting_view']);
Route::post('/update_calculator_settings', [HomePageController::class, 'update_calculator_settings']);
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

    // Home Routes
    Route::get('/', function () {
        return redirect('/home');
    });
    Route::get('/home', [HomeController::class,'index']);

    // Pricing Routes
    Route::get('/pricing', [PricingController::class,'pricing']);
    Route::get('/all_integration', [PricingController::class,'all_integration']);

    // About Routes
    Route::get('/about-us', [AboutController::class,'aboutus']);

    // State Home Routes
    Route::post('/statefetch_func_home', [HomeStateController::class,'statefetch_func_home']);
    Route::post('/stateget_change_home', [HomeStateController::class,'stateget_change_home']);

    // Register Routes
    Route::post('/registerstore', [RegisterStoreController::class, 'registerstore']);

    // Lead Hubspot Routes
    Route::post('/lead_storehubspot', [LeadController::class, 'storeLead'])->name('lead.store');
    Route::post('/submit_home_lead', [LeadController::class, 'submit_home_lead']);




Route::group(['middleware'=>['auth','roles:user']],function(){ 
    
    // Dashboard Routes
    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::post('/submit_checkstore_license', [DashboardController::class,'submit_checkstore_license']);
    Route::get('/payment_method', [DashboardController::class,'payment_method_view']);
    Route::get('/monthly_yearly', [DashboardController::class,'monthly_yearly_view']);
    Route::get('/change_password', [DashboardController::class, 'changepassword']);
    Route::post('/update-password', [DashboardController::class, 'updatePassword']);
    Route::get('/change_plan', [DashboardController::class,'change_plan_view']);


    // State Dashboard Routes
    Route::post('/statefetch_func', [DashboardStateController::class,'statefetch_func']);
    Route::post('/stateget_change', [DashboardStateController::class,'stateget_change']);
    
    // Submit Store
    Route::post('/submit_store_info', [DashboardSubmitStoreController::class,'submit_store_info']);
    
    // Trial Card Detail Routes
    Route::get('/card_details', [TrialCardDetailController::class,'card_details'])->name('card_details');
    Route::post('/update_card_detail', [TrialCardDetailController::class,'update_card_detail']);
    
    // Billing Dashboard Routes
    Route::get('/billing_history', [DashboardBillingController::class,'billing_history_view']);
    
    // Set Plan Trail Routes
    Route::get('/starting_plan', [SetPlanTrailController::class,'starting_plan_view']);
    Route::post('/starting_plan_set', [SetPlanTrailController::class,'starting_plan_set'])->name('starting_plan_set');
    
    // Card Detail Routes
    Route::get('/add_a_card', [CardDetailController::class, 'make_payment']);
    Route::post('/update_make_payment', [UpdateMakePaymentController::class,'update_make_payment']);
    
    // Change Plan Trial Routes
    Route::post('/change-plan-trailing', [ChangePlanTrailController::class, 'changePlanTrailing'])->name('change_plan_trailing');

   
    // Change Plan Active Routes
    Route::post('/Active-change-plan', [ActiveChangePlanController::class, 'changePlan'])->name('Active_change_plan');

});

    // Register Routes
    Route::get('/register/{token}', [RegisterController::class, 'showRegistrationForm'])->name('register');

    // Auth
    Auth::routes([]);