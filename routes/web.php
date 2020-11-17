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

Route::post('/item', 'App\Http\Controllers\ItemController@create');



Route::get('/order', 'App\Http\Controllers\OrderListController@show');

Route::post('/order', 'App\Http\Controllers\OrderListController@store');

Route::put('/order/{operation}/{id}', 'App\Http\Controllers\OrderListController@edit');

Route::delete('/order/{id}', 'App\Http\Controllers\OrderListController@destroy');



Route::get('/checkout', function (){
    return view('checkout');
});

Route::post('/checkout', 'App\Http\Controllers\OrderController@create');



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
