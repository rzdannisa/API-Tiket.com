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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('master/currency', 'Controller@view_Currency');
Route::get('cronGetCurrency', 'Controller@get_Currency');
Route::get('master/language', 'Controller@get_Language');
Route::get('cronGetLanguage', 'Controller@get_Language');
Route::get('master/country', 'Controller@get_Country');
Route::get('cronGetCountry', 'Controller@get_Country');
