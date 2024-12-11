<?php

namespace App\Exports;

use App\Data_warga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataWargaKategoriDisabilitasExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Status dalam keluarga
        $statusMapping = [
            0 => 'Kepala Keluarga',
            1 => 'Istri',
            2 => 'Anak',
            3 => 'Menantu',
            4 => 'Cucu',
            5 => 'Orang Tua',
            6 => 'Mertua',
            7 => 'Keluarga Lain',
            8 => 'Pembantu',
            9 => 'Lainnya',
        ];

        // Status perkawinan
        $statusPerkawinan = [
            0 => 'Belum Menikah',
            1 => 'Menikah',
            2 => 'Cerai Hidup',
            3 => 'Cerai Mati',
        ];

        // Base Status
        $baseStatus = [
            0 => 'Tidak',
            1 => 'Ya',
        ];

        return Data_warga::with(['religion', 'province', 'regency', 'subdistrict', 'village'])
        ->where('disabilitas', '1')
        ->get()
        ->map(function ($data) use ($statusMapping, $statusPerkawinan, $baseStatus) {
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
