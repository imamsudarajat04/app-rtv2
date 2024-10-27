<?php

namespace App\Http\Controllers\Admin;

use App\Data_warga;
use App\DeathData;
use App\Exports\DataKematianExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;

class DataKematianController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Exception
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $query = DeathData::query()
                ->get();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-primary" href="' . route('DataKematian.edit', $item->id) . '">
                            <i class="fas fa-pen"></i> Ubah
                        </a>
                        <button class="btn btn-danger delete_data_kematian" data-id="' . $item->id . '">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    ';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make();
        }
        return view('admin.kematian.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kematian.create');
    }

    /**
     * @param Request $request
     * @return void
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $validate = $this->validate($request, [
            "no_akte_kematian" => ["required", "string"],
            "no_ktp" => ["required", "string", "digits:16"],
            "name" => ["required", "string"],
            "address" => ["required", "string"]
        ]);

        $dataKematian = new DeathData();
        $dataKematian->no_akte_kematian = $request['no_akte_kematian'];
        $dataKematian->no_ktp = $request['no_ktp'];
        $dataKematian->name = $request['name'];
        $dataKematian->address = $request['address'];
        $dataKematian->save();

        if (!empty($request['no_ktp'])) {
            Data_warga::where('nik', $request['no_ktp'])
                ->update([
                    "is_death" => true
                ]);
        } else {
            return Redirect::back()
                ->with("error", 'No KTP tidak ditemukan!');
        }

        return redirect()
            ->route('DataKematian.index')
            ->with('success', 'Berhasil Tambah Data!');

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
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $deathData = DeathData::where('id', $id)
            ->first();
        return view('admin.kematian.edit', compact('deathData'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return void
     * @throws ValidationException
     */
    public function update(Request $request, $id)
    {
        $validate = $this->validate($request, [
            "no_akte_kematian" => ["required", "string"],
            "no_ktp" => ["required", "string", "digits:16"],
            "name" => ["required", "string"],
            "address" => ["required", "string"]
        ]);

        $dataToUpdate = $request->only(['no_akte_kematian', 'no_ktp', 'name', 'address']);

        DeathData::where('id', $id)->update($dataToUpdate);

        return redirect()
            ->route('DataKematian.index')
            ->with("success", 'Berhasil Update Data Kematian!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = DeathData::where('id', $id)
            ->first();

        if (!empty($cek)) {
            $cek->delete();
            return response()->json($cek);
        }else {
            return Redirect::back()
                ->with("error", "Data tidak ditemukan!");
        }
    }

    public function export()
    {
        return Excel::download(new DataKematianExport, 'DataKematian.xlsx');
    }
}
