<?php

namespace App\Exports;

use App\Data_warga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataPriaExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Data_warga::where('jenis_kelamin', 'Laki-laki')
        ->with(['religion', 'province', 'regency', 'subdistrict', 'village'])
            ->where('kategori_usia', 'Balita')
            ->get()
            ->map(function ($data) {
                return [
                    $data->id,
                    $data->no_kk,
                    $data->nik,
                    $data->nama_lengkap,
                    $data->tempat_lahir,
                    $data->tanggal_lahir,
                    $data->kategori_usia,
                    $data->jenis_kelamin,
                    $data->no_telp,
                    $data->alamat,
                    $data->rt,
                    $data->rw,
                ];
            });
    }

    /**
     * @return string[]
     */
    public function headings(): array
    {
        return [
            'NO',
            'NO KK',
            'NIK',
            'NAMA LENGKAP',
            'TEMPAT LAHIR',
            'TANGGAL LAHIR',
            'KATEGORI USIA',
            'JENIS KELAMIN',
            'NO TELP',
            'ALAMAT SEKARANG',
            'RT',
            'RW',
        ];
    }
}
