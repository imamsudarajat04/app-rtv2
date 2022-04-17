<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'm_kecamatan';
    protected $fillable = [
        'id_prov',
        'id_kab',
        'kode_bps',
        'nama_bps',
        'kode_dagri',
        'kode_dagri2',
        'nama_dagri',
    ];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class, 'id_kab');
    }
}
