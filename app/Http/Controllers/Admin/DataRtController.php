<?php

namespace App\Http\Controllers\Admin;

use App\Data_rt;
use Illuminate\Http\Request;
use App\Exports\DatartExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\DataRTRequest;
use Maatwebsite\Excel\Facades\Excel;
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
                        <a class="btn btn-primary" href="' . route('DataRT.edit', $item->id) . '">
                            <i class="fas fa-pen"></i> Ubah
                        </a>
                        <button class="btn btn-danger delete_akun" data-id="' . $item->id . '">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    ';
                })
                ->rawColumns(['action'])
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
        return view('admin.rt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DataRTRequest $request)
    {
        $data = $request->all();
        Data_rt::create($data);

        return redirect()->route('DataRT.index')->with('success', 'Data RT berhasil ditambahkan');
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
        $data = Data_rt::findOrFail($id);
        return view('admin.rt.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DataRTRequest $request, $id)
    {
        $data = Data_rt::findOrFail($id);
        $data->update($request->all());

        return redirect()->route('DataRT.index')->with('success', 'Data RT berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Data_rt::findOrFail($id);
        $item->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data RT Berhasil Dihapus'
        ]);
    }

    public function export() 
    {
        return Excel::download(new DatartExport, 'DataRT.xlsx');
    }
}
