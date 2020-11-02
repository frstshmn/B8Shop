<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function photos()
    {
        return $this->hasMany('App\Models\ItemPhoto');
    }

    public function sizes()
    {
        return $this->hasMany('App\Models\ItemSize');
    }
    use HasFactory;
}
