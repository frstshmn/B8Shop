<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemSize;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class OrderListController extends Controller
{
    public function create(){

    }

    public function store(Request $request){
        if(empty($_COOKIE['items_list'])){
            $items_list = array();
        } else {
            $items_list = json_decode(Cookie::get('items_list'));
        }

        $storetime = 120;
        $item = array(
            'item_id' => $request->item_id,
            'size_id' => $request->size,
            'quantity' => $request->quantity,
            'price' => ($request->quantity)*($request->price)
        );

        $items_list[] = $item;

        Cookie::queue('items_list', json_encode($items_list), $storetime);
    }

    public function show(){
        $items_list = json_decode(Cookie::get('items_list'));

        //$items_list = json_decode($items_list);

        foreach ($items_list as $item_list) {

            $item = Item::where('id', $item_list->item_id)->first();
            $item_size = ItemSize::where('id', $item_list->size_id)->first();

            $item_list->title = $item->title;
            $item_list->photo = $item->photos[0]->photo_link;
            $item_list->size = $item_size->title;
        }

        return view('basket', [
            'items_list' => $items_list
        ]);
    }
}
