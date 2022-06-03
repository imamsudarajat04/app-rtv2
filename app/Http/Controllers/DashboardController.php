<?php

namespace App\Http\Controllers;

use App\User;
use App\Data_rt;
use App\Data_warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'superadmin') {
            $user = User::count();
            $rt = Data_rt::count();
            $warga = Data_warga::count();
            $warga_pindahan = Data_warga::where('warga_pindahan', '=', '1')->count();
            return view('admin.index', [
                'user'           => $user,
                'rt'             => $rt,
                'warga'          => $warga,
                'warga_pindahan' => $warga_pindahan
            ]);
        } else {
            $warga = Data_warga::where('rt', Auth::user()->rt)->where('rw', Auth::user()->rw)->count();
            $warga_pindahan = Data_warga::where('rt', Auth::user()->rt)->where('rw', Auth::user()->rw)->where('warga_pindahan', '1')->count();
            return view('admin.index', [
                'warga'          => $warga,
                'warga_pindahan' => $warga_pindahan
            ]);
        }
        
    }
}
