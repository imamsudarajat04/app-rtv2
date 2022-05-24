<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GlobalSetting extends Model
{
    protected $table = "global_settings";

    protected $fillable = [
        'button_name',
        'image_cover',
        'link_status'
    ];
}
