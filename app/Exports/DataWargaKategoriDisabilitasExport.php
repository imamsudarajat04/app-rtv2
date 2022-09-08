<?php

namespace App\Exports;

use App\Data_warga;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataWargaKategoriDisabilitasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Data_warga::where('disabilitas', '1')->get();
    }
}
