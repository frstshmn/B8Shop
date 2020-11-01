<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(){
        return view('main', [
            'items' => Item::get(),
            'photos' => Item::find(1)->photos
        ]);
    }

    public function showById($id){
        return view('item', [
            'item' => Item::where('id', $id)->first(),
            'photos' => Item::where('id', $id)->first()->photos
        ]);
    }
}
