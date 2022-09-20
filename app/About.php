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
        'title_one', 
        'subtitle_one',
        'title_two', 
        'subtitle_two',
        'title_three', 
        'subtitle_three',
        'title_four', 
        'subtitle_four',
        'title_five', 
        'subtitle_five',
    ];
}
