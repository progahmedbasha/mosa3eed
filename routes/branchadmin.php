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
                    Route::resource('branches', BranchAdmin\BranchController::class);
                    Route::get('user_branch_accept/{id}', 'BranchAdmin\BranchController@accept')->name('user_branch_accept');
                    /************************************ Branch Shifts ************************************************/
                    Route::resource('shifts', 'BranchAdmin\BranchShiftController');
                    Route::get('all_shift_branches', 'BranchAdmin\BranchShiftController@all_branch_shift')->name('all_shift_branches');
                    Route::get('bran_shifts/{id}', 'BranchAdmin\BranchShiftController@shifts')->name('bran_shifts');
                    Route::get('bran_shift_create/{id}', 'BranchAdmin\BranchShiftController@create')->name('bran_shift_create');


                     /************************************ Branch Attendances ************************************************/
                    Route::resource('attendances', BranchAdmin\BranchAttendanceController::class);
                    Route::get('all_attendance_branches', 'BranchAdmin\BranchAttendanceController@all_branch_attendance')->name('all_attendance_branches');
                    Route::get('bran_attendance/{id}', 'BranchAdmin\BranchAttendanceController@attendance')->name('bran_attendance');
                    Route::get('bran_attendance_create/{id}', 'BranchAdmin\BranchAttendanceController@create')->name('bran_attendance_create');
                    Route::get('bran_easysign', 'BranchAdmin\BranchAttendanceController@easysign')->name('bran_easysign');
                    /************************************ employees ************************************************/ 
                    Route::get('employees_branch_branches', 'BranchAdmin\EmployeeController@all_branchs')->name('employees_branch_branches');
                    Route::get('branch_get_employees/{id}', 'BranchAdmin\EmployeeController@org_get_employees')->name('branch_get_employees');
                    Route::get('branch_employees_create/{id}', 'BranchAdmin\EmployeeController@create')->name('branch_employees_create');
                    Route::resource('branch_employees', BranchAdmin\EmployeeController::class);
                    
                    /************************************ pos ************************************************/
                    Route::resource('organization_sale_page', OrganizationAdmin\SalePageController::class);
                    Route::post('sale_store_ajax', 'OrganizationAdmin\SalePageController@sale_store_ajax')->name('org_sale_store_ajax');
                    Route::post('get_bill_number_ajax', 'OrganizationAdmin\SalePageController@get_bill_number_ajax')->name('org_get_bill_number_ajax');
                    Route::post('get_order_disc_num_ajax', 'OrganizationAdmin\SalePageController@get_order_disc_num_ajax')->name('org_get_order_disc_num_ajax');
                    Route::post('get_order_disc_persent_ajax', 'OrganizationAdmin\SalePageController@get_order_disc_persent_ajax')->name('org_get_order_disc_persent_ajax');
                    Route::delete('sale_ajax_destroy', 'OrganizationAdmin\SalePageController@sale_ajax_destroy')->name('org_sale_ajax_destroy');
                    Route::post('org_update_qty_ajax', 'OrganizationAdmin\SalePageController@update_qty_ajax')->name('org_update_qty_ajax');

                });
});