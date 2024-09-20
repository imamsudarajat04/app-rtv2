<?php

namespace App\Http\Controllers\Admin;

use App\Data_warga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DataLansiaController extends Controller
{
    public function index(Request $request)
    {
        if (Auth::user()->role == 'superadmin') {
            $data = Data_warga::where('kategori_usia',  'Lansia')
                ->get();
        } else {
            $data = Data_warga::where('kategori_usia',  'Lansia')
                ->where('rt', Auth::user()->rt)
                ->where('rw', Auth::user()->rw)
                ->get();
        }

        if (request()->ajax()) {
            $query = $data;

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
        return view('admin.lansia.index');
    }
}
