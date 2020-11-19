<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderList extends Model
{
    use HasFactory;
    public function item()
    {
        return $this->belongsTo('App\Models\Item');
    }
    public function size()
    {
        return $this->belongsTo('App\Models\ItemSize');
    }
}
