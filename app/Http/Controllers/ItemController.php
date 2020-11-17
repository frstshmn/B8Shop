<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemPhoto;
use App\Models\ItemSize;
use App\Models\XItemsSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /** Render a list of items
     * @method GET
     * @return list of views with 'items' argument
     */
    public function index(){

        $items = Item::get();

        return view('main', [
            'items' => $items
        ]);
    }

    /** Show particular item
     * @method GET
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
     * @method POST
     * @param request - values to insert into items table
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

    /** Render data to edit item
     * @method GET
     * @param id - identifier of item (received from wildcard)
     * @return JSON - json encoded item data
    */
    public function edit($id){

        $item = Item::where('id', $id)->first();
        $sizes = XItemsSize::where('item_id', $id)->get();

        $data[] = $item;
        $data['sizes'] = $sizes;
        return json_encode($data);

    }

    /** Update record in items table
     * @method PUT
     * @param request - values to update on items table
     * @return JSON - json encoded item data
    */
    public function update(Request $request){

        $item = Item::where('id', $request->id)->first();
        $item->title = $request->title;
        $item->category_id = $request->category;
        $item->description = $request->description;
        $item->consist = $request->consist;
        $item->caring = $request->caring;
        $item->price = $request->price;
        $item->save();

        // foreach ($request->file('photo') as $image) {
        //     $photo = new ItemPhoto();
        //     $photo->item_id = $item->id;
        //     $path = Storage::disk('photos')->put('/',$image);
        //     $photo->photo_link = "/photos/".$path;
        //     $photo->save();
        // }

        $xitemssizes = XItemsSize::where('item_id', $item->id);

        $xitemssizes->delete();

        foreach ($request->size as $size) {
            $x_items_size = new XItemsSize();
            $x_items_size->item_id = $item->id;
            $x_items_size->size_id = $size;
            $x_items_size->save();
        }
    }

    /** Delete record in items table
     * @method DELETE
     * @param request - values to update on items table
     * @return JSON - json encoded item data
    */
    public function delete(Request $request){

        $item = Item::where('id', $request->id)->first();

        $xitemssizes = XItemsSize::where('item_id', $item->id);
        $xitemssizes->delete();

        $item->delete();


        // foreach ($request->file('photo') as $image) {
        //     $photo = new ItemPhoto();
        //     $photo->item_id = $item->id;
        //     $path = Storage::disk('photos')->put('/',$image);
        //     $photo->photo_link = "/photos/".$path;
        //     $photo->save();
        // }


    }
}
