<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $table = 'buildings';

    protected $fillable = [
        'building_name',
        'building_price',
        'building_rent',
        'building_area',
        'building_type',
        'building_small_description',
        'building_meta',
        'building_large_description',
        'rooms',
        'status',
        'user_id',
        'image',
        'month',
        'year',

    ];
}
