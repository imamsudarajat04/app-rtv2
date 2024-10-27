<?php

namespace App\Exports;

use App\Data_rw;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataRwExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Data_rw::get()
        ->map(function($data, $index) {
            return [
                $index + 1,
                $data->nik,
                $data->name,
                $data->rt,
                $data->rw,
                $data->address,
                $data->phone,
                $data->village,
                $data->districts,
            ];
        });
    }

    public function headings(): array
    {
        return [
            "NO",
            "NIK",
            "NAMA LENGKAP",
            "RT",
            "RW",
            "ALAMAT",
            "NO TELP",
            "DESA",
            "DAERAH"
        ];
    }
}
