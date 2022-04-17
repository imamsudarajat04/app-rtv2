<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'm_provinsi';
    protected $fillable = [ 
        'kode_bps',
        'nama_bps',
        'kode_dagri',
        'nama_dagri',
    ];
}
