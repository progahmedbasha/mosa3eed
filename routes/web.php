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
	                Route::resource('admin', 'App\Http\Controllers\Admin\AdminController');
                    Route::post('fetch_city', [Country_state_cityController::class,'fetchCity'])->name('fetch_city');
                    Route::post('fetchdistrict', [Country_state_cityController::class,'fetchdistrict'])->name('fetchdistrict');
                    Route::resource('organizations', 'App\Http\Controllers\Admin\OrganizationController');
                    Route::resource('countries', 'App\Http\Controllers\CountryController');
                    Route::resource('cities', 'App\Http\Controllers\CityController');
                    Route::resource('districts', 'App\Http\Controllers\DistrictController');
                });  
});
    Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
