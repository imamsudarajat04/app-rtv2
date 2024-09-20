<?php

namespace App\Http\Controllers\Admin;

use App\Data_warga;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;
use App\Exports\DataWargaPindahanExport;
use Illuminate\Support\Facades\Auth;

class DataWargaPindahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $baseAuth = Auth::user()->role;

        if ($baseAuth == 'superadmin') {
            $baseData = Data_warga::where('warga_pindahan',  '1')->get();
        } else {
            $baseData = Data_warga::where('warga_pindahan',  '1')
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
        return view('admin.wargapindahan.index');
        // return "testing";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function export() 
    {
        return Excel::download(new DataWargaPindahanExport, 'DataWargaPindahan.xlsx');
    }
}
