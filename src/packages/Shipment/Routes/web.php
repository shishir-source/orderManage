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

Route::prefix('shipment')->group(function() {
    Route::get('/', 'ShipmentController@index')->name('shipment.index');
    Route::get('/create/{id?}', 'ShipmentController@create')->name('shipment.create');
    Route::post('/create/{id?}', 'ShipmentController@store')->name('shipment.create');
    Route::get('/edit/{id}', 'ShipmentController@edit')->name('shipment.edit');
    Route::post('/edit/{id}', 'ShipmentController@update')->name('shipment.edit');
    Route::get('/show/{id?}', 'ShipmentController@show')->name('shipment.show');
    Route::post('/show/{id?}', 'ShipmentController@show')->name('shipment.show');
    Route::get('/destroy/{id}', 'ShipmentController@destroy')->name('shipment.destroy');
});
