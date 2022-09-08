<?php

namespace App\Exports;

use App\Data_rt;
use Maatwebsite\Excel\Concerns\FromCollection;

class DatartExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Data_rt::all();
    }
}
