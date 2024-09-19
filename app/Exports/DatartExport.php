<?php

namespace App\Exports;

use App\Data_rt;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class DatartExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Data_rt::select([
            'id',
            'nik',
            'name',
            'rt',
            'rw',
            'address',
            'phone',
            'village',
            'districts'
        ])->get();
    }

    public function headings(): array 
    {
        return [
            'NO',
            'NIK',
            'NAMA LENGKAP',
            'RT',
            'RW',
            'ALAMAT',
            'NO TELP',
            'KELURAHAN',
            'KECAMATAN'
        ];
    }

    
}
