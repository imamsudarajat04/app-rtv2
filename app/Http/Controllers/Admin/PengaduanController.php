<?php

namespace App\Http\Controllers\Admin;

use App\Pengaduan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $query = Pengaduan::all();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-success" href="' . route('pengaduan-suara-admin.show', $item->slug) . '">
                            <i class="far fa-eye"></i> Detail 
                        </a>
                        <button class="btn btn-danger delete_akun" data-id="' . $item->id . '">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    ';
                })
                ->editColumn('message', function($item) {
                    if($item->message == "") {
                        return 'Tidak ada pesan';
                    }else{
                        return '
                            <p class="line-clamp">' . $item->message . '</p>
                        ';
                    }
                })
                ->rawColumns(['action', 'message'])
                ->addIndexColumn()
                ->make();
        }

        return view('admin.pengaduan.index');
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
    public function show($slug)
    {
        $data = Pengaduan::where('slug', $slug)->first();
        return view('admin.pengaduan.show', compact('data'));
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
        $find = Pengaduan::findOrFail($id);
        $find->delete();

        return response()->json($find);
    }
}
