<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Data_warga extends Model
{
    protected $table = 'data_wargas';

    protected $fillable = [
        'no_kk',
        'nik',
        'nama_lengkap',
        'no_telp',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'kategori_usia',
        'religions_id',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'kelurahan',
        'kode_pos',
        'alamat',
        'alamat_sebelumnya',
        'rt',
        'rw',
        'pendidikan',
        'jenis_pekerjaan',
        'status_perkawinan',
        'status_dalam_keluarga',
        'kewarganegaraan',
        'foto_kk',
        'foto_ktp',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'warga_pindahan',
        'bantuan_pemerintah',
        'disabilitas',
        'verification',
    ];

    public function religion(): BelongsTo
    {
        return $this->belongsTo('App\Religions', 'religions_id', 'id');
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo('App\Provinsi', 'provinsi', 'id');
    }

    public function regency(): BelongsTo
    {
        return $this->belongsTo('App\Kabupaten', 'kabupaten', 'id');
    }

    public function subdistrict(): BelongsTo
    {
        return $this->belongsTo('App\Kecamatan', 'kecamatan', 'id');
    }

    public function village(): BelongsTo
    {
        return $this->belongsTo('App\Kelurahan', 'kelurahan', 'id');
    }
}
