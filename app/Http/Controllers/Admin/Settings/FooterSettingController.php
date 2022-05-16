<?php

namespace App\Http\Controllers\Admin\Settings;

use App\FooterSettings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FooterSettingController extends Controller
{
    public function index() {
        $footerSettings = FooterSettings::first();
        return view('admin.setting.footersettings', compact('footerSettings'));
    }

    public function update(Request $request, $id) {
        $data = FooterSettings::find($id);
        $data->update($request->all());

        return redirect()->route('footer-setting.index')->with('success', 'Data berhasil diubah');
    }
}
