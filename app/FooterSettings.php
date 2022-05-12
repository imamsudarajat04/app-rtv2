<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FooterSettings extends Model
{
    protected $table = 'footer_settings';

    protected $fillable = [
        'alamat',
        'telepon1',
        'telepon2',
        'email',
        'twitter',
        'facebook',
        'instagram',
        'youtube',
        'whatsapp',
        'copyright'
    ];
}
