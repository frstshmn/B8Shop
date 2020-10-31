<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function showAll(){
        return view('main', [
            'items' => Item::get(),
            'photos' => Item::find(1)->photos
        ]);
    }
}
