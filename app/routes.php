<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

/*
Route::get('/', function()
{
	$categories = Category::all()->toJson();;
	print_r($categories);
	//return View::make('hello');
});
*/


//Homa page
Route::get('/', 'HomeController@showWelcome');

//Jobs page
Route::get('/jobs', 'JobsController@store');



