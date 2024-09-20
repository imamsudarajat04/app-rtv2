<?php

namespace App\Http\Controllers\Admin;

use App\Data_warga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DataWargaDisabilitasController extends Controller
{
    public function index(Request $request)
    {
        $baseAuth = Auth::user()->role;

        if ($baseAuth == 'superadmin') {
            $baseData = Data_warga::where('disabilitas',  '1')->get();
        } else {
            $baseData = Data_warga::where('disabilitas',  '1')
                ->where('rt', Auth::user()->rt)
                ->where('rw', Auth::user()->rw)
                ->get();
        }

        if (request()->ajax()) {
            $query = $baseData;

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
