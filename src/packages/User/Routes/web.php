<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
	return redirect()->route("login");
});

Route::middleware("admin_guest")->group(function(){
	Route::get('/login', 'AuthController@loginView')->name("login");
	Route::get('/admin/login', 'AuthController@loginView')->name("admin.login");
	Route::post('/login', 'AuthController@login')->name("login");
});

Route::middleware("admin")->prefix('admin')->group(function(){
	// Route::get('/', 'UserController@index')->name("admin.dashboard.index");
	Route::get('/logout', 'AuthController@logout')->name("admin.logout");

	Route::get('/user', 'UserController@index')->name("admin.user.index");
	Route::get('/user/create', 'UserController@create')->name("admin.user.create");
	Route::post('/user/create', 'UserController@store')->name("admin.user.create");
	Route::get('/user/update/{id?}', 'UserController@edit')->name("admin.user.update");
	Route::post('/user/update/{id?}', 'UserController@update')->name("admin.user.update");
	Route::delete('/user/delete/{id?}', 'UserController@destroy')->name("admin.user.destroy");

	/********************************************************************
	 * 	Profile
	 *********************************************************************/
	
	Route::get('/profile', 'ProfileController@index')->name("admin.profile.index");
	Route::get('/profile/create', 'ProfileController@create')->name("admin.profile.create");
	Route::post('/profile/create', 'ProfileController@store')->name("admin.profile.create");
	Route::get('/profile/update/{id?}', 'ProfileController@edit')->name("admin.profile.update");
	Route::post('/profile/update/{id?}', 'ProfileController@update')->name("admin.profile.update");
	Route::delete('/profile/delete/{id?}', 'ProfileController@destroy')->name("admin.profile.destroy");

	/********************************************************************
	 * 	Profile
	 *********************************************************************/

	Route::get('/change/password/{id?}', 'ResetPasswordController@index')->name("admin.forgot_password.index");
	Route::post('/change/password/{id?}', 'ResetPasswordController@reset')->name("admin.forgot_password.index");

});
