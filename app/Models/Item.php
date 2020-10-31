<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function photos()
    {
        return $this->hasMany('App\Models\Photo');
    }
    use HasFactory;
}
