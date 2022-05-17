<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HeaderSettings extends Model
{
    protected $table = 'header_settings';

    protected $fillable = [
        'app_name',
        'title',
        'subtitle',
    ];
}
