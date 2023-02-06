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
                });  
});