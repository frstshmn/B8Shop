<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NovaPoshtaCityTranslation extends Model
{
    //protected $primaryKey = 'nova_poshta_city_id';
    protected $guarded = [];
    use HasFactory;

    public function city_refs(){

        return $this->belongsTo('App\Models\NovaPoshtaCity', 'nova_poshta_city_id', 'id');

    }
}
