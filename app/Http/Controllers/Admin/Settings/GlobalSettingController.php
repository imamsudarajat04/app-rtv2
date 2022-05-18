<?php

namespace App\Http\Controllers\Admin\Settings;

use App\GlobalSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GlobalSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $globalSettings = GlobalSetting::first();
        return view('admin.setting.globalsettings', compact('globalSettings'));
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
        $validator = $request->validate([
            'button_name' => 'required',
            'image_cover' => 'file|image|mimes:jpeg,png,jpg,svg|max:5120',
        ]);

        $globalSetting = GlobalSetting::find($id);
        $data = $request->all();
        if($request->hasFile('image_cover')) {
            Storage::delete('public/' . $globalSetting->image_cover);
            $data['image_cover'] = $request->file('image_cover')->store('globalsettings/image_cover', 'public');
        }

        $globalSetting->update($data);
        return redirect()->route('global-setting.index')->with('success', 'Data berhasil diubah');
        
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
