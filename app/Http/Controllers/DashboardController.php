<?php

namespace App\Http\Controllers;

use App\DeathData;
use App\User;
use App\Data_rt;
use App\Data_rw;
use App\Data_warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class DashboardController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'superadmin') {
            $user = User::count();
            $rt = Data_rt::count();
            $warga = Data_warga::count();
            $warga_pindahan = Data_warga::where('warga_pindahan', '=', '1')
                ->count();
            $balita = Data_warga::where('kategori_usia', 'Balita')
                ->count();
            $lansia = Data_warga::where('kategori_usia', 'Lansia')
                ->count();
            $perempuan = Data_warga::where('jenis_kelamin', 'Perempuan')
                ->count();
            $pria = Data_warga::where('jenis_kelamin', 'Laki-laki')
                ->count();
            $rw = Data_rw::count();
            $notVerification = Data_warga::where('verification', '0')
                ->count();
            $disabilitas = Data_warga::where('disabilitas', '1')
                ->count();
            $bantuanPemerintah = Data_warga::where('bantuan_pemerintah', '1')
                ->count();
            $deathData = DeathData::count();

            if (request()->ajax()) {
                $query = Data_warga::where('verification', '0')
                    ->get();

                return DataTables::of($query)
                    ->addColumn('action', function ($item) {
                        return '
                            <a class="btn btn-primary" href="' . route('DataWarga.verification', $item->id) . '">
                                <i class="fas fa-check"></i> Verifikasi
                            </a>
                        ';
                    })
                    ->editColumn('verification', function ($item) {
                        if ($item->verification == '0') {
                            return '<span class="rounded-pill badge badge-danger">Belum Verifikasi Data</span>';
                        }else{
                            return '<span class="rounded-pill badge badge-success">Sudah Verifikasi Data</span>';
                        }
                    })
                    ->rawColumns(['action', 'verification'])
                    ->addIndexColumn()
                    ->make();
            }
            return view('admin.index', [
                'rt'                => $rt,
                'user'              => $user,
                'pria'              => $pria,
                'warga'             => $warga,
                'balita'            => $balita,
                'lansia'            => $lansia,
                'perempuan'         => $perempuan,
                'warga_pindahan'    => $warga_pindahan,
                'rw'                => $rw,
                'notVerification'   => $notVerification,
                'deathData'         => $deathData,
                'disabilitas'       => $disabilitas,
                'bantuanPemerintah' => $bantuanPemerintah,
            ]);
        } else {
            $pria = Data_warga::where('jenis_kelamin', 'Laki-laki')
                ->where('rt', Auth::user()->rt)
                ->where('rw', Auth::user()->rw)
                ->count();
            $perempuan = Data_warga::where('jenis_kelamin', 'Perempuan')
                ->where('rt', Auth::user()->rt)
                ->where('rw', Auth::user()->rw)
                ->count();
            $notVerification = Data_warga::where('verification', '0')
                ->where('rt', Auth::user()->rt)
                ->where('rw', Auth::user()->rw)
                ->count();
            $balita = Data_warga::where('kategori_usia', 'Balita')
                ->where('rt', Auth::user()->rt)
                ->where('rw', Auth::user()->rw)
                ->count();
            $warga = Data_warga::where('rt', Auth::user()->rt)
                ->where('rw', Auth::user()->rw)
                ->count();
            $lansia = Data_warga::where('kategori_usia', 'Lansia')
                ->where('rt', Auth::user()->rt)
                ->where('rw', Auth::user()->rw)
                ->count();
            $warga_pindahan = Data_warga::where('rt', Auth::user()->rt)
                ->where('rw', Auth::user()->rw)
                ->where('warga_pindahan', '1')
                ->count();
            $disabilitas = Data_warga::where('disabilitas', '1')
                ->where('rt', Auth::user()->rt)
                ->where('rw', Auth::user()->rw)
                ->count();
            $bantuanPemerintah = Data_warga::where('bantuan_pemerintah', '1')
                ->where('rt', Auth::user()->rt)
                ->where('rw', Auth::user()->rw)
                ->count();

            $deathData = DeathData::count();

            if (request()->ajax()) {
                $query = Data_warga::where('verification', '0')
                    ->where('rt', Auth::user()->rt)
                    ->where('rw', Auth::user()->rw)
                    ->get();

                return DataTables::of($query)
                    ->addColumn('action', function ($item) {
                        return '
                            <a class="btn btn-primary" href="' . route('DataWarga.verification', $item->id) . '">
                                <i class="fas fa-check"></i> Verifikasi
                            </a>
                        ';
                    })
                    ->editColumn('verification', function ($item) {
                        if ($item->verification == '0') {
                            return '<span class="rounded-pill badge badge-danger">Belum Verifikasi Data</span>';
                        } else {
                            return '<span class="rounded-pill badge badge-success">Sudah Verifikasi Data</span>';
                        }
                    })
                    ->rawColumns(['action', 'verification'])
                    ->addIndexColumn()
                    ->make();
            }

            return view('admin.index', [
                'warga'                => $warga,
                'warga_pindahan'       => $warga_pindahan,
                'pria'                 => $pria,
                'perempuan'            => $perempuan,
                'notVerification'      => $notVerification,
                'balita'               => $balita,
                'lansia'               => $lansia,
                'deathData'            => $deathData,
                'disabilitas'          => $disabilitas,
                'bantuanPemerintah'    => $bantuanPemerintah,
            ]);
        }
    }
}
