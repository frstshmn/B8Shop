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
            CURLOPT_URL => "https://api.novaposhta.ua/v2.0/json/",
            CURLOPT_RETURNTRANSFER => True,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_SSL_VERIFYHOST => 0,
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => '{"apiKey": "520ff1e4f5d575478b353c9fbc7918fe","modelName": "AddressGeneral",
                "calledMethod": "getWarehouses",
                "methodProperties": {
                    "Ref": "'.$order->warehouse.'"
                }}',
            CURLOPT_HTTPHEADER => array("content-type: application/json"),
        ));
        $response = json_decode(curl_exec($curl));
        $order->warehouse = $response->data[0]->Description;
        return json_encode($order);
    }

    /** Create new order
     * @method POST
     * @param request - values to create in order table
     * @return JSON - json encoded item data
    */
    public function create(Request $request){
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email',
            'phone' => 'required',
            'country' => 'required',
            'city' => 'required',
            'shipping' => 'required',
            'warehouse' => 'required',
            'comments' => 'max:1024',
            'payment_method' => 'required',
        ]);

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
        $order->status = "pending";

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
        $order->status = $request->status;

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
