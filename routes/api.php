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

Route::middleware('auth:api')->get('/details', function (Request $request) {
    return $request->user;
});

Route::post('/loginWe','EmployeeController@empLogin');
Route::post('/login', 'EmployeeController@login');
Route::post('/register', 'EmployeeController@register');

Route::post('/registerInterviewer','InterviewerController@registerInterviewer');
Route::post('/updateRound2Marks','InterviewerController@updateRound2Marks');
Route::group(['middleware' => 'auth:api'], function(){
	Route::post('/details', 'EmployeeController@details');
});
