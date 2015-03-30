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
/*
Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
*/
Route::get('/', 'WelcomeController@index');
Route::get('home', 'WelcomeController@index');

Route::get('vendors', 'VendorsController@index');
Route::get('vendors/list/{id?}', 'VendorsController@show');
Route::get('vendors/setCron/{id?}', 'VendorsController@setCron');
Route::get('vendors/unsetCron/{id?}', 'VendorsController@unsetCron');
Route::get('vendors/activate/{id?}', 'VendorsController@activate');
Route::get('vendors/deactivate/{id?}', 'VendorsController@deactivate');
Route::get('vendors/create','VendorsController@create');
Route::get('vendors/edit/{id?}','VendorsController@edit');
Route::post('vendors/store','VendorsController@store');

