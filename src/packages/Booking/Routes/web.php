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

Route::middleware("admin")->prefix('booking')->group(function() {
    Route::get('/', 'BookingController@index')->name('booking.index');
    Route::get('/create', 'BookingController@create')->name('booking.create');
    Route::post('/create', 'BookingController@store')->name('booking.create');
    Route::get('/edit', 'BookingController@edit')->name('booking.edit');
    Route::post('/edit', 'BookingController@update')->name('booking.edit');
    Route::get('/view/{id?}', 'BookingController@show')->name('booking.view');
    Route::post('/view/{id}', 'BookingController@showUpdate')->name('booking.view');
    Route::get('/destroy/{id}', 'BookingController@destroy')->name('booking.destroy');
    Route::get('/admin', 'BookingController@edit')->name('booking.admin.index');
    Route::get('/booking_list', 'BookingController@adminBooingList')->name('booking.admin.admin_booking_list');
    Route::get('/booking/latest', 'BookingController@latest')->name('booking.latest');
});
