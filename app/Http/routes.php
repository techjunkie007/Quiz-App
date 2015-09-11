<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Login Get Route
Route::get('login', function () {
    return view('login.login');
});

//Dashboard Post Route
Route::post('dashboard', ['uses'=>'LoginController@login']);

//Dashboard Get Route
Route::get('dashboard', function()
{
	//Authentication Check
	if (\Auth::check()) 
	{
		//Dashboard
		return view('dashboard.dashboard_home');
	}
});

//Generate Quiz Route
Route::get('quiz', ['uses'=>'QuizController@generateQuiz']);
