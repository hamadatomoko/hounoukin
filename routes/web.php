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
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
