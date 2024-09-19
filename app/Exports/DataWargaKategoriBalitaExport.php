<?php

namespace App\Exports;

use App\Data_warga;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class DataWargaKategoriBalitaExport implements FromCollection, WithHeadings
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
        ->where('kategori_usia', 'Balita')
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
                $data->religion ? $data->religion->name : null,
                $data->provinsi ? $data->province->nama_dagri : null,
                $data->kabupaten ? $data->regency->nama_dagri : null,
                $data->kecamatan ? $data->subdistrict->nama_dagri : null,
                $data->kelurahan ? $data->village->nama_dagri : null,
                $data->kode_pos,
                $data->alamat_sebelumnya,
                $data->alamat,
                $data->rt,
                $data->rw,
                $data->pendidikan,
                $data->jenis_pekerjaan,
                isset($statusPerkawinan[(int)trim($data->status_perkawinan)]) ? $statusPerkawinan[(int)trim($data->status_perkawinan)] : 'Status tidak diketahui',
                isset($statusMapping[(int)trim($data->status_dalam_keluarga)]) ? $statusMapping[(int)trim($data->status_dalam_keluarga)] : 'Status tidak diketahui',
                $data->kewarganegaraan,
                $data->nama_ayah,
                $data->pekerjaan_ayah,
                $data->nama_ibu,
                $data->pekerjaan_ibu,
                isset($baseStatus[(int)trim($data->warga_pindahan)]) ? $baseStatus[(int)trim($data->warga_pindahan)] : 'Status tidak diketahui',
                isset($baseStatus[(int)trim($data->bantuan_pemerintah)]) ? $baseStatus[(int)trim($data->bantuan_pemerintah)] : 'Status tidak diketahui',
                isset($baseStatus[(int)trim($data->disabilitas)]) ? $baseStatus[(int)trim($data->disabilitas)] : 'Status tidak diketahui',
                isset($baseStatus[(int)trim($data->verification)]) ? $baseStatus[(int)trim($data->verification)] : 'Status tidak diketahui',
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
            'AGAMA',
            'PROVINSI',
            'KABUPATEN',
            'KECAMATAN',
            'KELURAHAN',
            'KODE POS',
            'ALAMAT SEBELUMNYA',
            'ALAMAT SEKARANG',
            'RT',
            'RW',
            'PENDIDIKAN',
            'JENIS PEKERJAAN',
            'STATUS PERKAWINAN',
            'STATUS HUBUNGAN DALAM KELUARGA',
            'KEWARGANEGARAAN',
            'NAMA AYAH',
            'PEKERJAAN AYAH',
            'NAMA IBU',
            'PEKERJAAN IBU',
            'WARGA PINDAHAN',
            'BANTUAN PEMERINTAH',
            'DISABILITAS',
            'VERIFIKASI'
        ];
    }
}
