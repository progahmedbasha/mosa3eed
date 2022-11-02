<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Country_state_cityController;
use App\Http\Controllers\Admin\MedicinController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Organization\OrganizationAdminController;
use App\Http\Controllers\Organization\OrganizationshiftController;
use App\Http\Controllers\Organization\OrganizationAttendanceController;
use App\Http\Controllers\Organization\PurchaseController;
use App\Http\Controllers\Jobs\JobTitleController;
use App\Http\Controllers\Jobs\JobPostController;
use App\Http\Controllers\JobApplyController;
use App\Http\Controllers\TimelinePostController;
// for organization admin
use App\Http\Controllers\OrganizationAdmin\PharmacyAdminController;
use App\Http\Controllers\OrganizationAdmin\DashboardController;
use App\Http\Controllers\OrganizationAdmin\ProfileController;

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('homepage');
// Route::get('dashboard', function () {
//     return view('admin.index');
// });
// Route::get('list', function () {
//     return view('admin.list');
// });
Route::get('sign_out', 'Auth\AuthController@logout')->name('sign_out');
// routes for admin
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ], 
    ], function()
    {
            Route::group(
                [
                    'prefix' => 'admin',
                    'middleware' => [ 'auth:sanctum', 'verified' ,'admin' ],
                ], function()
                {
                        Route::get('dashboard', function () {
                            return view('admin.dashboard');
                        })->name('dashboard');
                    Route::resource('admin', Admin\AdminController::class);
                    Route::post('fetch_city', [Country_state_cityController::class,'fetchCity'])->name('fetch_city');
                    Route::post('fetchdistrict', [Country_state_cityController::class,'fetchdistrict'])->name('fetchdistrict');

                    Route::resource('organizations', Admin\OrganizationController::class);
                    Route::resource('countries', CountryController::class);
                    Route::resource('cities', CityController::class);
                    Route::resource('districts', DistrictController::class);
                    Route::resource('medicins', Admin\MedicinController::class);
                    Route::resource('settings', Admin\SettingController::class);
                    Route::resource('branchs', Admin\BranchController::class);
                    Route::resource('organization_admins', Organization\OrganizationAdminController::class);
                    Route::resource('organization_shifts', Organization\OrganizationshiftController::class);
                    Route::resource('organization_attendances', Organization\OrganizationAttendanceController::class);
                    Route::resource('purchases', Organization\PurchaseController::class);
                    Route::resource('job_titles', Jobs\JobTitleController::class);
                    Route::resource('job_posts', Jobs\JobPostController::class);
                    Route::post('fetch_branch', [Jobs\JobPostController::class,'fetch_branch'])->name('fetch_branch');

                    Route::resource('missed_items', MissedItemController::class);
                    Route::resource('packages', PackageController::class);
                    Route::resource('job_applies', JobApplyController::class);
                    Route::get('get_attacment/{id}', [JobApplyController::class,'get_attacment'])->name('get_attacment');
                    Route::resource('timeline_posts', 'TimelinePostController');

                    Route::get('post_like/{id}', 'TimelinePostController@post_like')->name('post_like');
                    // Route::get('post_like/{id}', [TimelinePostController::class,'post_like'])->name('post_like');
                    Route::get('post_comment/{id}', [TimelinePostController::class,'post_comment'])->name('post_comment');
                    Route::post('comment_status_change/{id}', [TimelinePostController::class,'comment_status_change'])->name('comment_status_change');
                    Route::resource('sale_page', SalePageController::class);
                    Route::post('sale_store_ajax', 'SalePageController@sale_store_ajax')->name('sale_store_ajax');
                    Route::delete('sale_ajax_destroy', 'SalePageController@sale_ajax_destroy')->name('sale_ajax_destroy');
                    
                });  
});
// routes for organization(pharmacy)
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ], 
    ], function()
    {
            Route::group(
                [
                    'prefix' => 'organization',
                    'middleware' => [ 'auth:sanctum', 'verified' , 'organization'],
                ], function()
                {
                        // Route::get('organization_dashboard', function () {
                        //     return view('organization.dashboard')->name('organization_dashboard');
                        // })->name('dashboard');
                    // Route::post('fetch_branch', [Jobs\JobPostController::class,'fetch_branch'])->name('fetch_branch');
                    Route::resource('organization_dashboard', OrganizationAdmin\DashboardController::class);
                    Route::resource('pharmacy_admins', OrganizationAdmin\PharmacyAdminController::class);
                    Route::resource('organization_medicins', OrganizationAdmin\MedicinController::class);
                    Route::resource('organization_profile', OrganizationAdmin\ProfileController::class);
                    Route::resource('organization_branchs', OrganizationAdmin\BranchController::class);
            
                });  
});
    Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
