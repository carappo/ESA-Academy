<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/','App\Http\Controllers\UserController@index')->name('list');
Route::get('/resetsignal/{id}','App\Http\Controllers\UserController@delete')->name('reset');
Route::get('/createPage','App\Http\Controllers\UserController@createPage')->name('sign_up');
Route::get('/save','App\Http\Controllers\UserController@store')->name('touroku');

