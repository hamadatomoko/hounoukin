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
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('dedicater/create', 'Admin\DedicaterController@add');
    Route::post('dedicater/create', 'Admin\DedicaterController@create');
    Route::get('dedicater/edit', 'Admin\DedicaterController@edit');
    Route::post('dedicater/edit', 'Admin\DedicaterController@update');
    Route::get('dedicater', 'Admin\DedicaterController@index');
    Route::get('festival/create', 'Admin\FestivalController@add');
   Route::post('festival/create', 'Admin\FestivalController@create');
      Route::get('festival/edit', 'Admin\FestivalController@edit');
    Route::post('festival/edit', 'Admin\FestivalController@update'); 
     Route::get('festival', 'Admin\FestivalController@index');
      Route::get('dedicater/detail', 'Admin\DedicaterController@detail');
     Route::get('dedication-money/create', 'Admin\DedicationMoneyController@add');
    Route::post('dedication-money/create', 'Admin\DedicationMoneyController@create');
    Route::get('dedication-money/edit', 'Admin\DedicationMoneyController@edit');
    Route::post('dedication-money/edit', 'Admin\DedicationMoneyController@update');
      Route::get('dedication-money', 'Admin\DedicationMoneyController@index');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

