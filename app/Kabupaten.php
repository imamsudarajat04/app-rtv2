<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
