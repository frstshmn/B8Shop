<?php

use Illuminate\Support\Facades\Route;
use App\Models\Item;
use App\Models\ItemSize;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderList;

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



Route::get('/order/{id}', 'App\Http\Controllers\OrderController@show');

Route::post('/order', 'App\Http\Controllers\OrderController@create');

Route::put('/order', 'App\Http\Controllers\OrderController@update');

Route::delete('/order', 'App\Http\Controllers\OrderController@delete');



Route::get('/orderlist', 'App\Http\Controllers\OrderListController@show');

Route::post('/orderlist', 'App\Http\Controllers\OrderListController@store');

Route::put('/orderlist/{operation}/{id}', 'App\Http\Controllers\OrderListController@edit');

Route::delete('/orderlist/{id}', 'App\Http\Controllers\OrderListController@destroy');



Route::get('/checkout', function (){ return view('checkout'); });



Route::get('/admin', function () {

    $items = Item::get();
    $item_sizes = ItemSize::get();
    $categories = Category::get();
    $orders = Order::get();
    foreach ($orders as $order) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.novaposhta.ua/v2.0/json/",
            CURLOPT_RETURNTRANSFER => True,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => '{"apiKey": "520ff1e4f5d575478b353c9fbc7918fe","modelName": "Address", "calledMethod": "getCities", "methodProperties": {"Ref": "'.$order->city.'"}}',
            CURLOPT_HTTPHEADER => array("content-type: application/json"),
        ));
        $response = json_decode(curl_exec($curl));
        $order->city = $response->data[0]->Description;
        curl_setopt_array($curl, array(
            CURLOPT_POSTFIELDS => '{"apiKey": "520ff1e4f5d575478b353c9fbc7918fe","modelName": "AddressGeneral",
                "calledMethod": "getWarehouses",
                "methodProperties": {
                    "Ref": "'.$order->warehouse.'"
                }}'
        ));
        $response = json_decode(curl_exec($curl));
        $order->warehouse = $response->data[0]->Description;
    }
    $order_lists = OrderList::get();

    return view('admin',[
        'items' => $items,
        'item_sizes' => $item_sizes,
        'categories' => $categories,
        'orders' => $orders,
        'order_lists' => $order_lists
    ]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
