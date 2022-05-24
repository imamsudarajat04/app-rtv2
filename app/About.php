<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'abouts';
    
    protected $fillable = 
    [
        'title', 
        'description', 
        'icon_one', 
        'title_one', 
        'subtitle_one', 
        'icon_two', 
        'title_two', 
        'subtitle_two', 
        'icon_three', 
        'title_three', 
        'subtitle_three', 
        'icon_four', 
        'title_four', 
        'subtitle_four'
    ];
}
