<?php

namespace App\Http\Controllers\Admin;

use App\Data_warga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class DataWargaDisabilitasController extends Controller
{
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $query = Data_warga::where('disabilitas',  '1')->get();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-success" href="' . route('DataWarga.show', $item->id) . '">
                            <i class="far fa-eye"></i> Detail
                        </a>
                    ';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make();
        }
        return view('admin.disabilitas.index');
    }
}
