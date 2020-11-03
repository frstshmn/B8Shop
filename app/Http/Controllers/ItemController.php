<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemSize;
use App\Models\XItemsSize;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /** Render a list of items
     * @return list of views with 'items' argument
     */
    public function index(){

        $items = Item::get();

        return view('main', [
            'items' => $items
        ]);
    }

    /** Show particular item
     * @param id - identifier of item (received from wildcard)
     * @return view with 'items' argument
    */
    public function showById($id){

        $item = Item::where('id', $id)->first();

        return view('item', [
            'item' => $item
        ]);
    }
}
