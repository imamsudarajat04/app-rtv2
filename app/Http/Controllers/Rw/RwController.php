<?php

namespace App\Http\Controllers\Rw;

use App\Data_rt;
use App\Data_warga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class RwController extends Controller
{
    public function DataWargaRW(Request $request)
    {
        if (request()->ajax()) {
            $query = Data_warga::where('rw', Auth::user()->rw);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-success" href="' . route('DataWarga.show', $item->id) . '">
                            <i class="far fa-eye"></i> Detail
                        </a>
                        <a class="btn btn-primary" href="' . route('DataWarga.edit', $item->id) . '">
                            <i class="fas fa-pen"></i> Ubah
                        </a>
                        <button class="btn btn-danger delete_warga" data-id="' . $item->id . '">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    ';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make();
        }
        return view('rw.datawarga.index');
    }

    public function DataRW(Request $request)
    {
        if (request()->ajax()) {
            $query = Data_rt::where('rw', Auth::user()->rw);

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-success" href="' . route('DataWarga.show', $item->id) . '">
                            <i class="far fa-eye"></i> Detail
                        </a>
                        <a class="btn btn-primary" href="' . route('DataWarga.edit', $item->id) . '">
                            <i class="fas fa-pen"></i> Ubah
                        </a>
                        <button class="btn btn-danger delete_warga" data-id="' . $item->id . '">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    ';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make();
        }
        return view('rw.datart.index');
    }

    public function DataWargaPindahanRW(Request $request)
    {
        if (request()->ajax()) {
            $query = Data_warga::where('warga_pindahan',  '1')->where('rw', Auth::user()->rw)->get();

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
        return view('rw.datawargapindahan.index');
    }
}
