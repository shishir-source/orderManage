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
    Route::post('/create', 'BookingController@store')->name('booking.store');
    Route::get('/edit', 'BookingController@edit')->name('booking.edit');
    Route::post('/edit', 'BookingController@update')->name('booking.edit');
    Route::get('/view/{id?}', 'BookingController@show')->name('booking.view');
    Route::post('/view/{id}', 'BookingController@showUpdate')->name('booking.view');
    Route::get('/destroy/{id}', 'BookingController@destroy')->name('booking.destroy');
    Route::get('/admin', 'BookingController@edit')->name('booking.admin.index');

    Route::get('/approve', 'BookingController@adminBooingList')->name('booking.admin.admin_booking_list');
    Route::get('/booking/latest', 'BookingController@latest')->name('booking.latest');

    /****************************************************
     *  Draft Booking
     ****************************************************/

    Route::get('/draft', 'DraftController@index')->name('booking.draft.index');
    Route::get('draft/edit/{id}', 'DraftController@edit')->name('booking.draft.edit');
    Route::post('draft/edit/{id}', 'DraftController@update')->name('booking.draft.edit');
    Route::get('draft/destroy/{id}', 'DraftController@destroy')->name('booking.draft.destroy');

    Route::post('payments/{id}', 'PaymentController@payment')->name('booking.payments');

    /****************************************************
     *  Excel Upload
     ****************************************************/

    Route::post('/excel_upload', 'ExcelController@import')->name('booking.excel_upload');
});
