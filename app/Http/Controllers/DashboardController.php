<?php

namespace App\Http\Controllers;

use App\User;
use App\Data_rt;
use App\Data_warga;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::count();
        $rt = Data_rt::count();
        $warga = Data_warga::count();
        return view('admin.index', [
            'user'  => $user,
            'rt'    => $rt,
            'warga' => $warga
        ]);
    }
}
