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

//@TODO middleware => auth when google authentication is in place
Route::get('/', 'Home@index');
Route::get('Auth', 'Home@oauth');
Route::get('Encryptor', 'Encryptor@index');
Route::get('Logout', 'Encryptor@logout');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
