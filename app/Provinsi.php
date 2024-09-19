<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Provinsi extends Model
{
    protected $table = 'm_provinsi';
    protected $fillable = [ 
        'kode_bps',
        'nama_bps',
        'kode_dagri',
        'nama_dagri',
    ];

    public function dataWargas(): HasMany
    {
        return $this->hasMany('App\Data_warga', 'provinsi', 'id');
    }

    public function kabupatens(): HasMany
    {
        return $this->hasMany('App\Kabupaten', 'provinsi_id', 'id');
    }
}
