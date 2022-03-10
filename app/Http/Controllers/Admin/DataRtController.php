<?php

namespace App\Http\Controllers\Admin;

use App\Data_rt;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class DataRtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $query = Data_rt::all();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-primary" href="' . route('DataAkun.edit', $item->id) . '">
                            Ubah
                        </a>
                        <button class="btn btn-danger delete_akun" data-id="' . $item->id . '">
                            Hapus
                        </button>
                    ';
                })
                ->editColumn('role', function($item) {
                    if($item->role == 'superadmin')
                    {
                        return '
                            <label class="badge badge-success mr-2">' . $item->role . '</label>
                        ';
                    }else{
                        return '
                            <label class="badge badge-primary mr-2">' . $item->role . '</label>
                        ';
                    }
                })
                ->rawColumns(['action', 'role'])
                ->addIndexColumn()
                ->make();
        }

        return view('admin.rt.index');
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
}
