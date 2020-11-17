<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function photos()
    {
        return $this->hasMany('App\Models\ItemPhoto');
    }

    public function sizes()
    {
        return $this->belongsToMany(ItemSize::class, 'x_items_sizes', 'item_id','size_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
