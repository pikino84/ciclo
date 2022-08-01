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

/*Lista los usuarios*/
Route::get('/', 'UserController@index');
/*Almacena los usuarios*/
Route::post('users', 'UserController@store')->name('users.store');
/*Elimina usuarios*/
Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
