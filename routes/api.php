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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/register', 'Api\AuthController@register');
Route::post('/login', 'Api\AuthController@login');



//Employee Routes

Route::get('/employee', 'Api\EmployeeController@index');
Route::post('/employee', 'Api\EmployeeController@store');
Route::post('/employee/{id}', 'Api\EmployeeController@update');
Route::delete('/employee/{emp}', 'Api\EmployeeController@destroy');
Route::get('/employee/{emp}', 'Api\EmployeeController@show');

//JobTitle Routes
Route::get('/jobtitle', 'Api\JobtitleController@index');

//Registration Routes
Route::get('/registration', 'Api\RegistrationController@index');