<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderList ;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class OrderController extends Controller
{
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
}
