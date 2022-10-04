<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\API\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::resource('job_titles', 'Jobs\JobTitleController');

    // Route::post('login', 'API\AuthController@login');
    // Route::post('logout', 'API\AuthController@logout');
    // Route::post('refresh', 'API\AuthController@refresh');
    // Route::post('me', 'API\AuthController@me');
Route::group([
    'namespace' => 'API',
    'prefix' => '{locale}',

], function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@createApiregister'); 
    Route::post('forgetpass', 'AuthController@forget');
    Route::post('resetpass', 'AuthController@reset');
    
    Route::group([
        'middleware' => ['jwt','customer']

    ], function ($router) {
        Route::get('profile', 'AuthController@profile');
        Route::get('logout', 'AuthController@logout');    
        Route::get('users', 'AuthController@home');    
    });
});