<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\SettingProfileRequest;

class SettingProfileController extends Controller
{
    public function index()
    {
        return view('admin.setting.settingprofile');
    }

    public function update(SettingProfileRequest $request, $id)
    {
        $cek = User::findOrFail($id);
        $data = $request->all();

        if($request->hasFile('avatar')){
            Storage::delete('public/' . $cek->avatar);
            $data['avatar'] = $request->file('avatar')->store('profile/avatars', 'public');
        }
        
        $cek->update($data);
        return redirect()->route('setting.index')->with('success', 'Data berhasil diupdate');
    }
}
