<?php

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
                    Route::resource('organization_dashboard', OrganizationAdmin\DashboardController::class);
                    Route::resource('organization_profile', OrganizationAdmin\ProfileController::class);
                    Route::resource('user_organizations', OrganizationAdmin\OrganizationController::class);
                    Route::get('org_branches/{id}', 'OrganizationAdmin\OrganizationController@branches')->name('org_branches');
                    Route::get('org_branch_add/{id}', 'OrganizationAdmin\BranchController@create')->name('org_branch_add');
                    Route::resource('organization_branchs', OrganizationAdmin\BranchController::class);
                    /************************************ Branch Shifts Admins ************************************************/
                    Route::resource('org_branch_shifts', OrganizationAdmin\BranchShiftController::class);
                    // Route::get('allorganizations_shift', [BranchShiftController::class,'allorganizations_shift'])->name('allorganizations_shift');
                    // Route::get('all_branch_shift/{id}', [BranchShiftController::class,'all_branch_shift'])->name('all_branch_shift');
                    Route::get('org_branch_shift/{id}', 'OrganizationAdmin\BranchShiftController@branch_shift')->name('org_branch_shift');
                    Route::get('org_shift_create/{id}', 'OrganizationAdmin\BranchShiftController@create')->name('org_shift_create');
                    Route::get('organization_branch_shifts/{id}', 'OrganizationAdmin\BranchShiftController@shifts')->name('organization_branch_shifts');
                    /************************************ Branch Admins ************************************************/
                    Route::resource('org_branch_admins', OrganizationAdmin\UserBranchController::class);
                    Route::get('org_admins_branch/{org}/{branch}', 'OrganizationAdmin\UserBranchController@admins_branch')->name('org_admins_branch');
                    Route::get('org_branch_admins_create/{org}/{branch}', 'OrganizationAdmin\UserBranchController@create')->name('org_branch_admins_create');
                    Route::get('org_branch_admin_edit/{org}/{branch}/{id}', 'OrganizationAdmin\UserBranchController@edit')->name('org_branch_admin_edit');
                    
                    /************************************ Organization Admins ************************************************/
                    Route::get('organiz_admins/{id}', 'OrganizationAdmin\OrganizationController@org_admins')->name('org_admins');
                    Route::resource('org_admins', OrganizationAdmin\OrganizationAdminController::class);
                    Route::get('org_admins_create/{id}', 'OrganizationAdmin\OrganizationAdminController@create')->name('org_admins_create');
                    Route::get('org_admins_edit/{id}/{org}', 'OrganizationAdmin\OrganizationAdminController@edit')->name('org_admins_edit');
                    // Route::resource('org_shifts', OrganizationAdmin\OrganizationshiftController::class);

                    ///////
                    // Route::get('organization_admin_edit/{user_id}/{id}', 'OrganizationAdmin\PharmacyAdminController@edite')->name('organization_admin_edit');

                    // Route::resource('organization_medicins', OrganizationAdmin\MedicinController::class);
                    // Route::resource('pharmacy_admins', OrganizationAdmin\PharmacyAdminController::class);
                    // Route::resource('org_employees', OrganizationAdmin\EmployeeController::class);


                    // Route::resource('organization_sale_page', OrganizationAdmin\SalePageController::class);
                    // Route::get('item_edite/{order}/{id}', 'OrganizationAdmin\SalePageController@item_edite')->name('org_item_edite');
                    // Route::patch('item_update/{id}', 'OrganizationAdmin\SalePageController@item_update')->name('org_item_update');
                    // Route::delete('order_item_delete/{order}/{id}', 'OrganizationAdmin\SalePageController@order_item_delete')->name('org_order_item_delete');
                    // Route::post('sale_store_ajax', 'OrganizationAdmin\SalePageController@sale_store_ajax')->name('org_sale_store_ajax');
                    // Route::post('org_update_qty_ajax', 'OrganizationAdmin\SalePageController@update_qty_ajax')->name('org_update_qty_ajax');
                    // Route::delete('sale_ajax_destroy', 'OrganizationAdmin\SalePageController@sale_ajax_destroy')->name('org_sale_ajax_destroy');
                    // Route::post('get_bill_number_ajax', 'OrganizationAdmin\SalePageController@get_bill_number_ajax')->name('org_get_bill_number_ajax');
                    // Route::post('get_order_disc_num_ajax', 'OrganizationAdmin\SalePageController@get_order_disc_num_ajax')->name('org_get_order_disc_num_ajax');
                    // Route::post('get_order_disc_persent_ajax', 'OrganizationAdmin\SalePageController@get_order_disc_persent_ajax')->name('org_get_order_disc_persent_ajax');
                    
                    // Route::resource('organization_branches', OrganizationAdmin\UserBranchController::class);
                    // Route::resource('organization_branch_medicins', OrganizationAdmin\BranchMedicinController::class);
                    // Route::resource('organization_purchases', OrganizationAdmin\PurchaseController::class);
                    // Route::resource('organization_timeline_posts', OrganizationAdmin\TimelinePostController::class);
                    // Route::post('change_comment_satus', 'OrganizationAdmin\TimelinePostController@change_comment_satus')->name('org_change_comment_satus');
                    // Route::resource('org_ads',OrganizationAdmin\AdController::class);
                    // Route::post('add_comment_ajax', 'OrganizationAdmin\TimelinePostController@add_comment_ajax')->name('org_add_comment_ajax');

                    // Route::resource('org_shifts', OrganizationAdmin\OrganizationshiftController::class);
                    // Route::resource('org_attendances', OrganizationAdmin\OrganizationAttendanceController::class);
                    // Route::resource('org_employees', OrganizationAdmin\EmployeeController::class);

                });  
});