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
//Home pages
Route::get('/', 'WelcomeController@index');
Route::get('home', 'WelcomeController@index');

//display the vendors list page
Route::get('vendors', 'VendorsController@index');
//fetch the list of vendors
Route::get('vendors/list/{id?}', 'VendorsController@show');
//activate vendor
Route::get('vendors/activate/{id?}', 'VendorsController@activate');
//deactivate vendor
Route::get('vendors/deactivate/{id?}', 'VendorsController@deactivate');
//activate cron for vendor
Route::get('vendors/setCron/{id?}', 'VendorsController@setCron');
//deactivate cron for vendor
Route::get('vendors/unsetCron/{id?}', 'VendorsController@unsetCron');
//create new vendor
Route::get('vendors/create','VendorsController@create');
//edit a vendor
Route::get('vendors/edit/{id?}','VendorsController@edit');
//save new vendor or changes to vendor
Route::post('vendors/store','VendorsController@store');

//Display vendor mfg map creation page
Route::get('vendorsmfg/create','VendorsMfgMapController@showmfgmap');
//display list of mfgs for the vendor
Route::get('vendormfgs/{id?}', 'VendorsMfgMapController@showMfgs');

//fetch the list of mfgs (ajax) for the vendor
Route::get('vendormfgslist/{id?}', 'VendorsMfgMapController@mfgs');

//display list of products for the manufacturer
Route::get('vmproducts/{id?}', 'VendorsMfgMapController@showProducts');
//fetch the list of products for the manufacturer
Route::get('vmproductslist/{id?}', 'VendorsMfgMapController@products');
