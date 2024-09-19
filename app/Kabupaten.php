<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kabupaten extends Model
{
    protected $table = 'm_kabupaten';

    protected $fillable  = [
        'id_prov',
        'nama_bps',
        'kode_dagri',
        'kode_dagri2',
        'nama_dagri',
        'tipe',
    ];

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_prov');
    }

    public function dataWargas(): HasMany
    {
        return $this->hasMany('App\Data_warga', 'kabupaten', 'id');
    }
}
