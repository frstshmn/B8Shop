<?php

namespace App\Http\Controllers;

use App\Models\Promocode;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    public function check($value){

        $promocode = Promocode::where('promocode', $value)->first();

        if(!empty($promocode)){
            return $promocode->discount;
        }

        return response()->json(['error' => 'Invalid promocode'], 500);
    }
}
