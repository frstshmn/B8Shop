<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemSize;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Throwable;

class OrderListController extends Controller
{
    /** Rendering $_COOKIE global array to show items in basket
     *
     * @return view 'basket' with list of items in basket
     *
     */
    public function show(){
        $basket = json_decode(Cookie::get('basket'));

        if(empty($basket)){
            return view('basket');
        }

        foreach ($basket as $basket_item) {
            $item = Item::where('id', $basket_item->item_id)->first();
            $item_size = ItemSize::where('id', $basket_item->size_id)->first();

            $basket_item->title = $item->title;
            $basket_item->photo = $item->photos[0]->photo_link;
            $basket_item->size = $item_size->title;
        }

        return view('basket', [
            'basket' => $basket
        ]);
    }

    public function create(){

    }

    /** Adding new item to basket
     *
     * @method POST
     *
     * @param item_id - Id of particular item from table 'items'
     * @param size_id - Id of item size from table 'item_sizes'
     * @param quantity - Quantity of particular item
     * @param price - Price of particular item
     *
     * @return HTTP_CODE
     *
     */
    public function store(Request $request){
        if(empty($_COOKIE['basket'])){
            $basket = array();
        } else {
            $basket = json_decode(Cookie::get('basket'), true);
        }

        $storetime = 120;
        $item = array(
            'item_id' => $request->item_id,
            'size_id' => $request->size,
            'quantity' => $request->quantity,
            'price' => $request->price
        );

        $basket[] = $item;

        Cookie::queue('basket', json_encode($basket), $storetime);

        return response()->json(['success' => 'Item added to basket'], 200);
    }

    public function update(){

    }


    /** Adding new item to basket
     *
     * @method PUT
     *
     * @param operation - Type of operation
     * @param id - Index of item in $_COOKIE['basket'] array
     *
     * @return HTTP_CODE
     *
     */
    public function edit($operation, $id){
        if(empty($_COOKIE['basket'])){
            return 'You haven`t any items in your basket';
        } else {
            $storetime = 120;
            $basket = json_decode(Cookie::get('basket'));

            if($operation == 'decrease'){
                $basket[$id]->quantity -= 1;
            }
            elseif($operation == 'increase'){
                $basket[$id]->quantity += 1;
            }
            else{
                return response()->json(['error' => 'Invalid operation'], 404);
            }

            Cookie::queue('basket', json_encode($basket), $storetime);

            return response()->json(['success' => 'Quantity has been changed'], 200);
        }
    }

    /** Delete certain item from COOKIE
     *
     * @method DELETE
     *
     * @param id - Index of item in $_COOKIE['basket'] array
     *
     * @return HTTP_CODE
     *
     */
    public function destroy($id){
        if(empty($_COOKIE['basket'])){
            return response()->json(['error' => 'It seems your basket has been wiped out'], 404);
        } else {
            $basket = json_decode(Cookie::get('basket'), true);
        }

        $basket = array_values($basket);

        $storetime = 120;

        unset($basket[$id]);

        Cookie::queue('basket', json_encode($basket), $storetime);

        return response()->json(['success' => 'Item deleted from basket'], 200);
    }
}
