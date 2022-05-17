<?php

namespace App\Http\Controllers\Admin;

use App\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $query = Faq::all();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-primary" href="' . route('Faq.edit', $item->id) . '">
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

        return view('admin.faqs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Faq::create($data);

        return redirect()->route('Faq.index')->with('success', 'Data Berhasil Ditambahkan');
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
        $find = Faq::find($id);

        return view('admin.faqs.edit', compact('find'));
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
        $data = $request->all();

        $find = Faq::find($id);
        $find->update($data);

        return redirect()->route('Faq.index')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = Faq::find($id);
        $find->delete();

        return response()->json($find);
    }
}
