<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManfaatSetting extends Model
{
    protected $table = 'manfaat_settings';
    protected $fillable = 
    [
        'title', 
        'description', 
        'icon_one', 
        'title_one', 
        'short_description_one', 
        'icon_two', 
        'title_two', 
        'short_description_two', 
        'icon_three', 
        'title_three', 
        'short_description_three', 
        'icon_four', 
        'title_four', 
        'short_description_four'
    ];
}
