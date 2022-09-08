<?php

namespace App\Exports;

use App\Data_warga;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataWargaKategoriBantuanPemerintahExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Data_warga::where('bantuan_pemerintah', '1')->get();
    }
}
