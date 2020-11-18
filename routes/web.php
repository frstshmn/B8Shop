<?php

use Illuminate\Support\Facades\Route;
use App\Models\Item;
use App\Models\ItemSize;
use App\Models\Category;

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

Route::get('/item/edit/{id}', 'App\Http\Controllers\ItemController@edit');

Route::post('/item', 'App\Http\Controllers\ItemController@create');

Route::put('/item', 'App\Http\Controllers\ItemController@update');

Route::delete('/item', 'App\Http\Controllers\ItemController@delete');



Route::get('/category/{id}', 'App\Http\Controllers\CategoryController@show');

Route::post('/category', 'App\Http\Controllers\CategoryController@create');

Route::put('/category', 'App\Http\Controllers\CategoryController@update');

Route::delete('/category', 'App\Http\Controllers\CategoryController@delete');



Route::get('/order/{id}', 'App\Http\Controllers\OrderListController@show');

Route::post('/order', 'App\Http\Controllers\OrderController@create');

Route::put('/order', 'App\Http\Controllers\OrderListController@edit');

Route::delete('/order', 'App\Http\Controllers\OrderListController@destroy');



Route::get('/orderlist', 'App\Http\Controllers\OrderListController@show');

Route::post('/orderlist', 'App\Http\Controllers\OrderListController@store');

Route::put('/orderlist/{operation}/{id}', 'App\Http\Controllers\OrderListController@edit');

Route::delete('/orderlist/{id}', 'App\Http\Controllers\OrderListController@destroy');



Route::get('/checkout', function (){ return view('checkout'); });



Route::get('/admin', function () {

    $items = Item::get();
    $item_sizes = ItemSize::get();
    $categories = Category::get();

    return view('admin',[
        'items' => $items,
        'item_sizes' => $item_sizes,
        'categories' => $categories
    ]);
});
