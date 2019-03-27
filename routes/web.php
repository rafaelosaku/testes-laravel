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

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/', 'Testes\TestesController@calendar')->name('calendar');
Route::resource('/events', 'EventController');
Route::get('/crops', 'CropController@index')->name('crops.index');
Route::post('/crops-store', 'CropController@store')->name('crops.store');
Route::post('/crop-image', 'CropController@cropImage')->name('crop.image');
