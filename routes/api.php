<?php

use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/register/check', 'AuthController@check')->name('api-register-check');
Route::get('/province', 'API\LocationController@get_province')->name('api-get-province');
Route::get('/regency/{province_id}', 'API\LocationController@get_regency')->name('api-get-regency');