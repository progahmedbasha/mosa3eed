<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Country_state_cityController;
use App\Http\Controllers\Admin\MedicinController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\UserBranchController;
use App\Http\Controllers\Organization\OrganizationAdminController;
use App\Http\Controllers\BranchShiftController;
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
// use App\Http\Controllers\OrganizationAdmin\TimelinePostController;
use App\Http\Controllers\TimelinePostController;

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

Route::get('sign_out', 'Auth\AuthController@logout')->name('sign_out');
Route::post('fetch_city', [Country_state_cityController::class,'fetchCity'])->name('fetch_city');
Route::post('fetchdistrict', [Country_state_cityController::class,'fetchdistrict'])->name('fetchdistrict');
Route::post('fetch_branch', 'Fetch_branchController@fetch_branch')->name('fetch_branchs');
/*************************** Regiester Organization Without Auth ************************************/
Route::get('organization_create', 'Admin\OrganizationController@create')->name('organization_create');
Route::post('organization_submit', 'Admin\OrganizationController@store')->name('organization_submit');

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
                    /************************************ Admins And Owners ************************************************/
                    Route::resource('admin', Admin\AdminController::class);
                    /************************************ Organizations ************************************************/
                    Route::resource('organizations', Admin\OrganizationController::class);
                    /************************************ Organization Branches ************************************************/
                    Route::get('organization_branches/{id}', [OrganizationController::class, 'branches'])->name('organization_branches');
                    /************************************ Organization Admins ************************************************/
                    // branch_admins here make
                    Route::get('org_admins/{id}', [OrganizationController::class,'org_admins'])->name('org_admins');
                    Route::resource('organization_admins', Organization\OrganizationAdminController::class);
                    Route::get('organization_admins_create/{id}', 'Organization\OrganizationAdminController@create')->name('organization_admins_create');
                    Route::get('organization_admins_edit/{id}/{org}', 'Organization\OrganizationAdminController@edit')->name('organization_admins_edit');
                    
                    /************************************ Section Countries ************************************************/
                    Route::resource('countries', CountryController::class);
                    Route::resource('cities', CityController::class);
                    Route::resource('districts', DistrictController::class);
                    Route::resource('medicins', Admin\MedicinController::class);
                    Route::resource('settings', Admin\SettingController::class);
                    /************************************ Section Brsnches ************************************************/
                    Route::resource('branchs', Admin\BranchController::class);
                    Route::get('branch_add/{id}', 'Admin\BranchController@create')->name('branch_add');
                    
                    /************************************ Branch Admins ************************************************/
                    Route::resource('branch_admins', Admin\UserBranchController::class);
                    Route::get('admins_branch/{org}/{branch}', [UserBranchController::class,'admins_branch'])->name('admins_branch');
                    Route::get('branch_admins_create/{org}/{branch}', [UserBranchController::class,'create'])->name('branch_admins_create');
                    Route::get('branch_admin_edit/{org}/{branch}/{id}', [UserBranchController::class,'edit'])->name('branch_admin_edit');
                    
                    /************************************ Branch Shifts Admins ************************************************/
                    Route::resource('organization_shifts', 'BranchShiftController');
                    Route::get('allorganizations_shift', [BranchShiftController::class,'allorganizations_shift'])->name('allorganizations_shift');
                    Route::get('all_branch_shift/{id}', [BranchShiftController::class,'all_branch_shift'])->name('all_branch_shift');
                    // Route::get('branch_shift/{id}', [BranchShiftController::class,'branch_shift'])->name('branch_shift');
                    Route::get('shift_create/{id}', [BranchShiftController::class,'create'])->name('shift_create');
                    Route::get('branch_shifts/{id}', [BranchShiftController::class,'shifts'])->name('branch_shifts');
                    /************************************ Branch Attendances ************************************************/
                    Route::resource('organization_attendances', BranchAttendanceController::class);
                    Route::get('allorg_attendance', 'BranchAttendanceController@allorg_attendance')->name('allorg_attendance');
                    Route::get('all_branch_attendance/{id}', 'BranchAttendanceController@all_branch_attendance')->name('all_branch_attendance');
                    Route::get('org_branch_attendance/{id}', 'BranchAttendanceController@attendance')->name('org_branch_attendance');
                    Route::get('attendance_create/{id}', 'BranchAttendanceController@create')->name('attendance_create');
                    Route::get('easysign', 'BranchAttendanceController@easysign')->name('easysign');

                    Route::resource('purchases', Organization\PurchaseController::class);
                    Route::resource('job_titles', Jobs\JobTitleController::class);
                    Route::resource('job_posts', Jobs\JobPostController::class);
                    Route::post('fetch_branch', [Jobs\JobPostController::class,'fetch_branch'])->name('fetch_branch');

                    Route::resource('missed_items', MissedItemController::class);
                    Route::resource('packages', PackageController::class);
                    Route::resource('job_applies', JobApplyController::class);
                    Route::get('get_attacment/{id}', 'JobApplyController@get_attacment')->name('get_attacment');
                    Route::resource('timeline_posts', 'TimelinePostController');
                    // Route::get('change_comment_satus/{id}', 'TimelinePostController@change_comment_satus')->name('change_comment_satus');
                    Route::get('post_like/{id}', 'TimelinePostController@post_like')->name('post_like');
                    // Route::get('post_like/{id}', [TimelinePostController::class,'post_like'])->name('post_like');
                    
                    Route::post('change_comment_satus', [TimelinePostController::class,'change_comment_satus'])->name('change_comment_satus');
                    Route::post('comment_status_changes/{id}', [TimelinePostController::class,'comment_status_change'])->name('comment_status_changes');
                    Route::resource('sale_page', SalePageController::class);
                    Route::get('item_edites/{order}/{id}', 'SalePageController@item_edite')->name('item_edites');
                    Route::patch('item_update/{id}', 'SalePageController@item_update')->name('item_update');
                    Route::delete('order_item_delete/{order}/{id}', 'SalePageController@order_item_delete')->name('order_item_delete');
                    Route::post('sale_store_ajax', 'SalePageController@sale_store_ajax')->name('sale_store_ajax');
                    // Route::post('update_qty_ajax', 'SalePageController@update_qty_ajax')->name('update_qty_ajax');
                    
                    Route::delete('sale_ajax_destroy', 'SalePageController@sale_ajax_destroy')->name('sale_ajax_destroy');
                    Route::resource('employees', EmployeeController::class);
                    Route::resource('ads', AdController::class);
                    Route::post('add_comment_ajax', [TimelinePostController::class,'add_comment_ajax'])->name('add_comment_ajax');
                    Route::resource('effective_materials', Effective_MaterialController::class);
                    Route::resource('suppliers', SupplierController::class);
                    Route::resource('medicin_shapes', Medicin_shapesController::class);
                    Route::resource('medicin_types', Medicin_typesController::class);
                });  
});


    Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');