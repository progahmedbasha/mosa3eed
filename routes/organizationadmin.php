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
                    /************************************ Branch Shifts  ************************************************/
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
                    Route::get('organiz_admins/{id}', 'OrganizationAdmin\OrganizationController@org_admins')->name('org_org_admins');
                    Route::resource('org_admins', OrganizationAdmin\OrganizationAdminController::class);
                    Route::get('org_admins_create/{id}', 'OrganizationAdmin\OrganizationAdminController@create')->name('org_admins_create');
                    Route::get('org_admins_edit/{id}/{org}', 'OrganizationAdmin\OrganizationAdminController@edit')->name('org_admins_edit');
                    /************************************ shifts ************************************************/
                    Route::resource('orgshifts', 'OrganizationAdmin\BranchShiftController');
                    Route::get('all_org_shift_branches', 'OrganizationAdmin\BranchShiftController@all_org_shift')->name('all_org_shift_branches');
                    Route::get('user_org_branches/{id}', 'OrganizationAdmin\BranchShiftController@all_branch_shift')->name('user_org_branches');
                    /************************************ attendances ************************************************/
                    Route::resource('org_attendances', OrganizationAdmin\OrganizationAttendanceController::class);
                    Route::get('all_org_attendance_branches', 'OrganizationAdmin\OrganizationAttendanceController@all_org_attendance')->name('all_org_attendance_branches');
                    Route::get('user_org_attendance/{id}', 'OrganizationAdmin\OrganizationAttendanceController@all_branch_attendance')->name('user_org_attendance');
                    Route::get('org_branch_attendance/{id}', 'OrganizationAdmin\OrganizationAttendanceController@branch_attendance')->name('org_branch_attendance');
                    Route::get('bran_org_attendance_create/{id}', 'OrganizationAdmin\OrganizationAttendanceController@create')->name('bran_org_attendance_create');
                    /************************************ easy signup ************************************************/
                    Route::get('easysign_org', 'OrganizationAdmin\OrganizationAttendanceController@easysign')->name('easysign_org');
                    /************************************ employees ************************************************/ 
                    Route::get('all_org_employees', 'OrganizationAdmin\EmployeeController@all_org_employees')->name('all_org_employees');
                    Route::get('employees_org_branches/{id}', 'OrganizationAdmin\EmployeeController@all_branchs')->name('employees_org_branches');
                    Route::get('org_get_employees/{id}', 'OrganizationAdmin\EmployeeController@org_get_employees')->name('org_get_employees');
                    Route::get('org_employees_create/{id}', 'OrganizationAdmin\EmployeeController@create')->name('org_employees_create');
                    Route::resource('org_employees', OrganizationAdmin\EmployeeController::class);
                    
            
                });  
});