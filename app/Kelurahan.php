<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kelurahan extends Model
{
    protected $table = 'm_kelurahan';
    protected $fillable = [
        'id_prov',
        'id_kab',
        'id_kec',
        'kode_bps',
        'nama_bps',
        'kode_dagri',
        'kode_dagri2',
        'nama_dagri',
        'tipe',
    ];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kec');
    }

    public function dataWargas(): HasMany
    {
        return $this->hasMany(Data_warga::class, 'kelurahan', 'id');
    }
}
