<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Route;
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

Route::group([
    'middleware' => 'api',
    'namespace' => 'API',
    'prefix' => 'auth',
], function () {
        Route::post('login', 'ApiAuthController@login');
        Route::post('logout', 'ApiAuthController@logout');
        Route::post('refresh', 'ApiAuthController@refresh');
        Route::post('me', 'ApiAuthController@me');
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
//    'middleware' => 'auth:api',
    'namespace' => 'API',
], function () {
    Route::apiResource('movie', 'ApiMovieController');
    Route::apiResource('author', 'ApiAuthorController')->only('index');
});

