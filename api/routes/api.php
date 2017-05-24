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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::post('login', function (Request $request) {
//    dd("123");
//});

header ( 'Access-Control-Allow-Origin:  *' ) ;
header ( 'Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE' ) ;
header ( 'Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization, auth_token, user_type' ) ;
header ( 'Access-Control-Expose-Headers:  App-Content-Full-Count' ) ;

Route::post('/login', [
    'uses' => 'LoginController@login',
    'as' => 'login'
]);

Route::post('/checkUser', [
    'uses' => 'UserController@checkUser',
    'as' => 'checkUser'
]);



