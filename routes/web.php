<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterStoreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;

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
Route::get('/videos_setting', [HomePageController::class, 'videos_setting_view']);
Route::get('/images_setting', [HomePageController::class, 'images_setting_view']);
Route::get('/integration_images', [HomePageController::class, 'integration_images_view']);
Route::get('/steps_setting', [HomePageController::class, 'steps_setting_view'])->name('steps_setting');;
Route::post('update_text_settings', [HomePageController::class, 'update_text_settings'])->name('update_text_settings');
Route::post('update_home_text2', [HomePageController::class, 'update_home_text2'])->name('update_home_text2');
Route::post('update_circle_text_settings', [HomePageController::class, 'update_circle_text_settings'])->name('update_circle_text_settings');
Route::post('update_video_settings', [HomePageController::class, 'update_video_settings'])->name('update_video_settings');
Route::post('/add_integration_images', [HomePageController::class, 'add_integration_images'])->name('add_integration_images');
Route::delete('/delete_integration_images/{id}', [HomePageController::class, 'delete_integration_images'])->name('delete_integration_images');
Route::post('/add_image_settings', [HomePageController::class, 'add_image_settings'])->name('add_image_settings');
Route::post('/add_step_settings', [HomePageController::class, 'add_step_settings'])->name('add_step_settings');
Route::delete('/delete_image_settings/{id}', [HomePageController::class, 'delete_image_settings'])->name('delete_image_settings');
Route::get('/edit_step/{id}', [HomePageController::class, 'edit_step'])->name('edit_step');
Route::post('/update_step/{id}', [HomePageController::class, 'update_step'])->name('update_step');
Route::delete('/delete_step/{id}', [HomePageController::class, 'delete_step'])->name('delete_step');


});
Route::get('/', function () {
    return redirect('/home');
});

Route::get('/home', [HomeController::class,'index']);
Route::post('/registerstore', [RegisterStoreController::class, 'registerstore']);

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