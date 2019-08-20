<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'api/v1'], function(){

    Route::resource('/meeting', 'MeetingController', [
        'except'=>['edit', 'create']
    ]);

    Route::resource('/meeting/registration', 'RegistrationController', [
        'only'=>['store', 'destroy']
    ]);

    Route::post('/user', [
        'uses' => 'AuthController@Store'
    ]);

    Route::('/user/signin', [
        'uses' => 'AuthController@signin'
    ] );
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


