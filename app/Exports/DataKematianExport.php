<?php

namespace App\Exports;

use App\DeathData;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DataKematianExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DeathData::get()->map(function($data, $index) {
            return [
                $index + 1,
                $data->no_akte_kematian,
                $data->no_ktp,
                $data->name,
                $data->address
            ];
        });
    }

    public function headings(): array
    {
        return [
            "NO",
            "NO AKTE KEMATIAN",
            "NO KTP",
            "NAMA LENGKAP",
            "ALAMAT"
        ];
    }
}
