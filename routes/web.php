<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Country_state_cityController;
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
});
Route::get('dashboard', function () {
    return view('admin.index');
});
Route::get('list', function () {
    return view('admin.list');
});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ], 
    ], function()
    {
            Route::group(
                [
                    'prefix' => 'admin',
                    'middleware' => [ 'auth:sanctum', 'verified' ],
                ], function()
                {
                        Route::get('dashboard', function () {
                            return view('admin.dashboard');
                        })->name('dashboard');
	                Route::resource('admin', 'Admin\AdminController');
                    Route::post('fetch_city', [Country_state_cityController::class,'fetchCity'])->name('fetch_city');
                    Route::post('fetchdistrict', [Country_state_cityController::class,'fetchdistrict'])->name('fetchdistrict');
                    Route::resource('organizations', 'Admin\OrganizationController');
                    Route::resource('countries', 'CountryController');
                    // Route::resource('countries', CountryController::class);
                    Route::resource('cities', 'CityController');
                    Route::resource('districts', 'DistrictController');
                    Route::resource('medicins', 'Admin\MedicinController');
                    Route::resource('settings', 'Admin\SettingController');
                    Route::resource('branchs', 'Admin\BranchController');
                    Route::resource('organization_admins', 'Organization\OrganizationAdminController');
                    Route::resource('organization_shifts', 'Organization\OrganizationshiftController');
                    Route::resource('organization_attendances', 'Organization\OrganizationAttendanceController');
                    Route::resource('purchases', 'Organization\PurchaseController');
                });  
});
    Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
