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

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization, auth_token, user_type');
header('Access-Control-Expose-Headers:  App-Content-Full-Count');

Route::post('/login', [
    'uses' => 'LoginController@login',
    'as' => 'login'
]);

Route::post('/autoLogin', [
    'uses' => 'LoginController@autoLogin',
    'as' => 'autoLogin'
]);

//Route::get('/signup', [
//    'uses' => 'UserController@signup',
//    'as' => 'signup'
//]);

Route::post('/signup', [
    'uses' => 'UserController@signup',
    'as' => 'signup'
]);

Route::post('/checkuser', [
    'uses' => 'UserController@checkuser',
    'as' => 'checkuser'
]);

Route::post('/addCategory', [
    'uses' => 'CategoryController@createCategory',
    'as' => 'addCategory'
]);

Route::get('/getCategory', [
    'uses' => 'CategoryController@getCategory',
    'as' => 'getCategory'
]);

Route::get('/getCategoryByIncome/{id}', [
    'uses' => 'CategoryController@getCategoryByIncome',
    'as' => 'getCategoryByIncome'
]);

Route::get('/getCategoryByType/{data}', [
    'uses' => 'CategoryController@getCategoryByType',
    'as' => 'getCategoryByType'
]);



Route::get('/editCategory/{id}', [
    'uses' => 'CategoryController@editCategory',
    'as' => 'editCategory'
]);


Route::post('/postEditCategory/{id}', [
    'uses' => 'CategoryController@postEditCategory',
    'as' => 'postEditCategory'
]);

Route::post('/deleteCat/{id}', [
    'uses' => 'CategoryController@deleteCat',
    'as' => 'deleteCat'
]);



Route::post('/addIncome/{id}', [
    'uses' => 'IncomeController@createIncome',
    'as' => 'addIncome'
]);

Route::get('/getIncome/{id}', [
    'uses' => 'IncomeController@getIncome',
    'as' => 'getIncome'
]);


Route::get('/totalIncome/{id}', [
    'uses' => 'IncomeController@totalIncome',
    'as' => 'totalIncome'
]);

Route::get('/totalBankIncome/{id}', [
    'uses' => 'IncomeController@totalBankIncome',
    'as' => 'totalBankIncome'
]);


Route::get('/getStore', [
    'uses' => 'IncomeController@getStore',
    'as' => 'getStore'
]);


Route::get('/editIncome/{id}', [
    'uses' => 'IncomeController@editIncome',
    'as' => 'editIncome'
]);


Route::post('/postEditIncome/{id}', [
    'uses' => 'IncomeController@postEditIncome',
    'as' => 'postEditIncome'
]);

Route::post('/deleteIncome/{id}', [
    'uses' => 'IncomeController@deleteIncome',
    'as' => 'deleteIncome'
]);

Route::get('/getTotalAmount/{uid}/{bid}', [
    'uses' => 'IncomeController@getTotalAmount',
    'as' => 'getTotalAmount'
]);






Route::get('/getBank/{id}', [
    'uses' => 'BankController@getBank',
    'as' => 'getBank'
]);
Route::post('/addBank/{id}', [
    'uses' => 'BankController@createBank',
    'as' => 'addBank'
]);


Route::get('/editBank/{id}', [
    'uses' => 'BankController@editBank',
    'as' => 'editBank'
]);


Route::post('/postEditBank/{id}', [
    'uses' => 'BankController@postEditBank',
    'as' => 'postEditBank'
]);

Route::post('/deleteBank/{id}', [
    'uses' => 'BankController@deleteBank',
    'as' => 'deleteBank'
]);



Route::get('/totalExpenses/{id}', [
    'uses' => 'ExpensesController@totalExpenses',
    'as' => 'totalExpenses'
]);

Route::get('/getBankExpenses/{id}', [
    'uses' => 'ExpensesController@getBankExpenses',
    'as' => 'getBankExpenses'
]);

Route::get('/getExpenses/{id}', [
    'uses' => 'ExpensesController@getExpenses',
    'as' => 'getExpenses'
]);

Route::post('/addExpenses/{id}', [
    'uses' => 'ExpensesController@createExpenses',
    'as' => 'addExpenses'
]);
