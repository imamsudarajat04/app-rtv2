<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_rt extends Model
{
    protected $table = 'data_rts';
    protected $fillable = [
        'nik',
        'name', 
        'rt',
        'rw',
        'address', 
        'phone', 
        'village', 
        'districts'
    ];
}
