<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderList;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{
    /** Render data to show order
     * @method GET
     * @param id - identifier of category (received from wildcard)
     * @return JSON - json encoded item data
    */
    public function show($id){
        $order = Order::where('id', $id)->first();
        return json_encode($order);
    }

    /** Create new order
     * @method POST
     * @param request - values to create in order table
     * @return JSON - json encoded item data
    */
    public function create(Request $request){
        $order = new Order;
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->country = $request->country;
        $order->city = $request->city;
        $order->shipping = $request->shipping;
        $order->warehouse = $request->warehouse;
        $order->comments = $request->comments;
        $order->payment_method = $request->payment_method;
        $order->status = "Pending";

        $order->save();

        $basket = json_decode(Cookie::get('basket'));

        foreach ($basket as $basket_item) {
            $order_list = new OrderList;
            $order_list->order_id = $order->id;
            $order_list->item_id = $basket_item->item_id;
            $order_list->quantity = $basket_item->quantity;
            $order_list->size_id = $basket_item->size_id;
            $order_list->price = $basket_item->price;
            $order_list->save();
        }
    }

    /** Update existing order
     * @method PUT
     * @param request - values to update in order table
     * @return JSON - json encoded item data
    */
    public function update(Request $request){
        $order = Order::where('id', $request->id)->first();
        $order->first_name = $request->first_name;
        $order->last_name = $request->last_name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->country = $request->country;
        $order->city = $request->city;
        $order->shipping = $request->shipping;
        $order->warehouse = $request->warehouse;
        $order->comments = $request->comments;
        $order->payment_method = $request->payment_method;
        $order->status = "Pending";

        $order->save();
    }

    /** Delete particular order
     * @method DELETE
     * @param request - values
     * @return JSON - json encoded item data
    */
    public function delete(Request $request){
        $order = Order::where('id', $request->id)->first();
        $order->delete();
    }
}
