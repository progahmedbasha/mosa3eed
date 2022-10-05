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
})->name('homepage');
Route::get('dashboard', function () {
    return view('admin.index');
});
Route::get('list', function () {
    return view('admin.list');
});
Route::get('sign_out', 'Auth\AuthController@logout')->name('sign_out');
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
                    Route::resource('missed_items', MissedItemController::class);
                    Route::resource('packages', PackageController::class);

                });  
});
    Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
