<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    /*
     * table name
     * @var string
     */
    protected $table = 'site_settings';

    /*
     * fill table data
     * @var array
     */
    protected $fillable = [
        'slug', 'name_setting', 'value', 'type'
    ];
}
