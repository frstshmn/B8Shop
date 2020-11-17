<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemPhoto;
use App\Models\XItemsSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function show($id){

        $item = Item::where('id', $id)->first();

        return view('item', [
            'item' => $item
        ]);
    }

    /** Create new item
     * @param id - identifier of item (received from wildcard)
     * @return HTTP_CODE
    */
    public function create(Request $request){

        $item = new Item();
        $item->title = $request->title;
        $item->category_id = $request->category;
        $item->description = $request->description;
        $item->consist = $request->consist;
        $item->caring = $request->caring;
        $item->price = $request->price;
        $item->save();

        foreach ($request->file('photo') as $image) {
            $photo = new ItemPhoto();
            $photo->item_id = $item->id;
            $path = Storage::disk('photos')->put('/',$image);
            $photo->photo_link = "/photos/".$path;
            $photo->save();
        }

        foreach ($request->size as $size) {
            $x_items_size = new XItemsSize();
            $x_items_size->item_id = $item->id;
            $x_items_size->size_id = $size;
            $x_items_size->save();
        }

    }
}
