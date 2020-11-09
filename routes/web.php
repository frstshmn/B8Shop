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

Route::get('/', 'App\Http\Controllers\ItemController@index');

Route::get('/item/{id}', 'App\Http\Controllers\ItemController@show');

Route::post('/order', 'App\Http\Controllers\OrderListController@store');

Route::get('/order', 'App\Http\Controllers\OrderListController@show');

Route::put('/order/{operation}/{id}', 'App\Http\Controllers\OrderListController@edit');

Route::delete('/order/{id}', 'App\Http\Controllers\OrderListController@destroy');
