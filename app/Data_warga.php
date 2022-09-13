<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        'rt',
        'rw',
        'pendidikan',
        'jenis_pekerjaan',
        'status_perkawinan',
        'status_dalam_keluarga',
        'kewarganegaraan',
        'foto_kk',
        'no_paspor',
        'no_kitas_kitap',
        'foto_paspor',
        'nama_ayah',
        'pekerjaan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'warga_pindahan',
        'bantuan_pemerintah',
        'disabilitas',
    ];
}
