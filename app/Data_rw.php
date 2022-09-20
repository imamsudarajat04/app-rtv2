<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data_rw extends Model
{
    protected $table = 'data_rws';
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
