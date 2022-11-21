<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Country_state_cityController;
use App\Http\Controllers\Admin\MedicinController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BranchController;
// use App\Http\Controllers\Admin\UserBranchController;
use App\Http\Controllers\Organization\OrganizationAdminController;
use App\Http\Controllers\Organization\OrganizationshiftController;
use App\Http\Controllers\Organization\OrganizationAttendanceController;
use App\Http\Controllers\Organization\PurchaseController;
use App\Http\Controllers\Jobs\JobTitleController;
use App\Http\Controllers\Jobs\JobPostController;
// use App\Http\Controllers\JobApplyController;
// use App\Http\Controllers\TimelinePostController;
// for organization admin
use App\Http\Controllers\OrganizationAdmin\PharmacyAdminController;
use App\Http\Controllers\OrganizationAdmin\DashboardController;
use App\Http\Controllers\OrganizationAdmin\ProfileController;
use App\Http\Controllers\OrganizationAdmin\BranchMedicinController;
use App\Http\Controllers\OrganizationAdmin\TimelinePostController;

// use App\Http\Controllers\OrganizationAdmin\PurchaseController;

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
                    Route::resource('branch_admins', Admin\UserBranchController::class);
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
                    Route::get('get_attacment/{id}', 'JobApplyController@get_attacment')->name('get_attacment');
                    Route::resource('timeline_posts', 'TimelinePostController');

                    Route::get('post_like/{id}', 'TimelinePostController@post_like')->name('post_like');
                    // Route::get('post_like/{id}', [TimelinePostController::class,'post_like'])->name('post_like');
                    Route::get('post_comment/{id}', [TimelinePostController::class,'post_comment'])->name('post_comment');
                    Route::post('comment_status_change/{id}', [TimelinePostController::class,'comment_status_change'])->name('comment_status_change');
                    Route::resource('sale_page', SalePageController::class);
                    Route::get('item_edite/{order}/{id}', 'SalePageController@item_edite')->name('item_edite');
                    Route::patch('item_update/{id}', 'SalePageController@item_update')->name('item_update');
                    Route::delete('order_item_delete/{order}/{id}', 'SalePageController@order_item_delete')->name('order_item_delete');
                    Route::post('sale_store_ajax', 'SalePageController@sale_store_ajax')->name('sale_store_ajax');
                    Route::post('update_qty_ajax', 'SalePageController@update_qty_ajax')->name('update_qty_ajax');
                    
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

                    Route::resource('organization_sale_page', OrganizationAdmin\SalePageController::class);
                    Route::get('item_edite/{order}/{id}', 'OrganizationAdmin\SalePageController@item_edite')->name('item_edite');
                    Route::patch('item_update/{id}', 'OrganizationAdmin\SalePageController@item_update')->name('item_update');
                    Route::delete('order_item_delete/{order}/{id}', 'OrganizationAdmin\SalePageController@order_item_delete')->name('order_item_delete');
                    Route::post('sale_store_ajax', 'OrganizationAdmin\SalePageController@sale_store_ajax')->name('sale_store_ajax');
                    Route::post('update_qty_ajax', 'OrganizationAdmin\SalePageController@update_qty_ajax')->name('update_qty_ajax');
                    Route::delete('sale_ajax_destroy', 'OrganizationAdmin\SalePageController@sale_ajax_destroy')->name('sale_ajax_destroy');
                    Route::post('get_bill_number_ajax', 'OrganizationAdmin\SalePageController@get_bill_number_ajax')->name('get_bill_number_ajax');
                    Route::post('get_order_disc_num_ajax', 'OrganizationAdmin\SalePageController@get_order_disc_num_ajax')->name('get_order_disc_num_ajax');
                    Route::post('get_order_disc_persent_ajax', 'OrganizationAdmin\SalePageController@get_order_disc_persent_ajax')->name('get_order_disc_persent_ajax');
                    
                    // Route::resource('organization_branches', OrganizationAdmin\UserBranchController::class);
                    Route::resource('organization_branch_medicins', OrganizationAdmin\BranchMedicinController::class);
                    Route::resource('organization_purchases', OrganizationAdmin\PurchaseController::class);
                    Route::resource('organization_timeline_posts', OrganizationAdmin\TimelinePostController::class);
                    Route::get('post_like/{id}', 'OrganizationAdmin\TimelinePostController@post_like')->name('post_like');
                    Route::get('post_comment/{id}', 'OrganizationAdmin\TimelinePostController@post_comment')->name('post_comment');
                    Route::post('comment_status_change/{id}', 'OrganizationAdmin\TimelinePostController@comment_status_change')->name('comment_status_change');

                });  
});
// routes for Branch Admin
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ], 
    ], function()
    {
            Route::group(
                [
                    'prefix' => 'branch_admin',
                    'middleware' => [ 'auth:sanctum', 'verified' , 'BranchAdmin'],
                ], function()
                {
                  
                    Route::resource('branch_dashboard', BranchAdmin\DashboardController::class);
                    Route::resource('branch_admin_profile', BranchAdmin\ProfileController::class);
                    Route::post('fetch_city', [Country_state_cityController::class,'fetchCity'])->name('fetch_city');
                    Route::post('fetchdistrict', [Country_state_cityController::class,'fetchdistrict'])->name('fetchdistrict');
                    Route::resource('branch_admin_branches', BranchAdmin\UserBranchController::class);
                     Route::resource('branch_admin_purchases', BranchAdmin\PurchaseController::class);
                    Route::resource('branch_admin_branch_medicins', BranchAdmin\BranchMedicinController::class);
                    Route::resource('branch_admin_sale_page', BranchAdmin\SalePageController::class);
                    
                    Route::get('item_edite/{order}/{id}', 'BranchAdmin\SalePageController@item_edite')->name('item_edite');
                    Route::patch('item_update/{id}', 'BranchAdmin\SalePageController@item_update')->name('item_update');
                    Route::delete('order_item_delete/{order}/{id}', 'BranchAdmin\SalePageController@order_item_delete')->name('order_item_delete');
                    Route::post('sale_store_ajax', 'BranchAdmin\SalePageController@sale_store_ajax')->name('sale_store_ajax');
                    Route::post('update_qty_ajax', 'BranchAdmin\SalePageController@update_qty_ajax')->name('update_qty_ajax');
                    Route::delete('sale_ajax_destroy', 'BranchAdmin\SalePageController@sale_ajax_destroy')->name('sale_ajax_destroy');
                    Route::post('get_bill_number_ajax', 'BranchAdmin\SalePageController@get_bill_number_ajax')->name('get_bill_number_ajax');
                    Route::post('get_order_disc_num_ajax', 'BranchAdmin\SalePageController@get_order_disc_num_ajax')->name('get_order_disc_num_ajax');
                    Route::post('get_order_disc_persent_ajax', 'BranchAdmin\SalePageController@get_order_disc_persent_ajax')->name('get_order_disc_persent_ajax');
                    
                    Route::resource('branch_admin_timeline_posts', BranchAdmin\TimelinePostController::class);
                    Route::get('post_like/{id}', 'BranchAdmin\TimelinePostController@post_like')->name('post_like');
                    Route::get('post_comment/{id}', 'BranchAdmin\TimelinePostController@post_comment')->name('post_comment');
                    Route::post('comment_status_change/{id}', 'BranchAdmin\TimelinePostController@comment_status_change')->name('comment_status_change');
                    

                });  
});
    Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
