<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /** Render data to show item
     * @method GET
     * @param id - identifier of category (received from wildcard)
     * @return JSON - json encoded item data
    */
    public function show($id){
        $cat = Category::where('id', $id)->first();

        return json_encode($cat);
    }

    /** Render data to show item
     * @method POST
     * @param request - values to create in categories table
     * @return JSON - json encoded item data
    */
    public function create(Request $request){
        $cat = new Category();

        $cat->title = $request->title;

        $cat->save();
    }

    /** Render data to show item
     * @method PUT
     * @param request - values to update on categories table
     * @return JSON - json encoded item data
    */
    public function update(Request $request){
        $cat = Category::where('id', $request->id)->first();

        $cat->title = $request->title;

        $cat->save();
    }

    /** Render data to show item
     * @method DELETE
     * @param request - values to delete in categories table
     * @return JSON - json encoded item data
    */
    public function delete(Request $request){
        $cat = Category::where('id', $request->id)->first();

        $cat->delete();
    }
}
