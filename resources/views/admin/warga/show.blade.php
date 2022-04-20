@extends('admin.layouts.master')

@section('title', 'Admin | Halaman Data Warga')

@section('content')
<div class="pagetitle">
    <h1>Pengelolaan Data Warga</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
        <li class="breadcrumb-item">Table</li>
        <li class="breadcrumb-item active">Data Warga</li>
      </ol>
    </nav>
</div><!-- End Page Title -->


<!-- Content Row -->
<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="card shadow mb-4">
            <!-- Card Body -->
            <div class="card-body">
                <div class="row details-pendaftaran">
                    {{-- <div class="col-12 col-md-2">
                        <div class="row">
                            <div class="col-12">
                                <div class="title mb-2">Foto</div>
                            </div>
                            <div class="col-12 image-wrapper mb-3">
                                <div class="image" style="background-image : url('{{ Storage::exists('public/' . $data->foto) && $data->foto ? Storage::url($data->foto) : asset('images/user.png') }}')"></div>
                            </div>
                            <div class="col-12">
                                <div class="title mb-2">Swafoto</div>
                            </div>
                            <div class="col-12 image-wrapper">
                                <div class="image" style="background-image : url('{{ Storage::exists('public/' . $data->swafoto) && $data->swafoto ? Storage::url($data->swafoto) : asset('images/user.png') }}')"></div>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-12 col-md-10">
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">Nomor Kartu Keluarga</div>
                                <div class="subtitle">{{ $data->no_kk }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">Nomor Induk Kependudukan</div>
                                <div class="subtitle">{{ $data->nik }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">Nama Lengkap</div>
                                <div class="subtitle">{{ $data->nama_lengkap }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">Tempat Lahir</div>
                                <div class="subtitle">{{ $data->tempat_lahir }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">Tanggal Lahir</div>
                                <div class="subtitle">{{ \Carbon\Carbon::parse($data->tanggal_lahir)->format('d/m/Y') }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">Jenis Kelamin</div>
                                <div class="subtitle">{{ $data->jenis_kelamin }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">Agama</div>
                                <div class="subtitle">{{ $religions->name }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">Provinsi</div>
                                <div class="subtitle">{{ $provinces->nama_bps }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">Kabupaten / Kota</div>
                                <div class="subtitle">{{ $regencies->nama_dagri }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">Kecamatan</div>
                                <div class="subtitle">{{ $districts->nama_bps }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">Kelurahan</div>
                                <div class="subtitle">{{ $villages->nama_bps }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">Kode Pos</div>
                                <div class="subtitle">{{ $data->kode_pos }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">Alamat</div>
                                <div class="subtitle">{{ $data->alamat }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">RT</div>
                                <div class="subtitle">{{ $data->rt }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">RW</div>
                                <div class="subtitle">{{ $data->rw }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">Pendidikan</div>
                                <div class="subtitle">{{ $data->pendidikan }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">Jenis Pekerjaan</div>
                                <div class="subtitle">{{ $data->jenis_pekerjaan }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">Status Perkawinan</div>
                                <div class="subtitle">
                                    {{-- {{ $data->citaCita }} --}}
                                    @if ($data->status_perkawinan == '0')
                                        Belum Kawin
                                    @elseif ($data->status_perkawinan == '1')
                                        Kawin
                                    @elseif ($data->status_perkawinan == '2')
                                        Cerai Hidup
                                    @elseif ($data->status_perkawinan == '3')
                                        Cerai Mati
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">Status Dalam Keluarga</div>
                                <div class="subtitle">{{ $sdk }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">Kewarganegaraan</div>
                                <div class="subtitle">
                                    @if ($data->kewarganegaraan == 'WNI')
                                        Warga Negara Indonesia
                                    @elseif ($data->kewarganegaraan == 'WNA')
                                        Warga Negara Asing
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">Nomor Paspor</div>
                                <div class="subtitle">
                                    @if($data->no_paspor == null)
                                        -
                                    @else
                                        {{ $data->no_paspor }}
                                    @endif
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">Nomor Kitas / Kitap</div>
                                <div class="subtitle">
                                    @if($data->no_kitas_kitap == null)
                                        -
                                    @else
                                        {{ $data->no_kitas_kitap }}
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">Nama Ayah</div>
                                <div class="subtitle">{{ $data->nama_ayah }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">Pekerjaan Ayah</div>
                                <div class="subtitle">{{ $data->pekerjaan_ayah }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">Nama Ibu</div>
                                <div class="subtitle">{{ $data->nama_ibu }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">Pekerjaan Ibu</div>
                                <div class="subtitle">{{ $data->pekerjaan_ibu }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="title">Foto Kartu Keluarga</div>
                                <div class="banner-image-wrapper">
                                    <div class="image" style="background-image: url({{ Storage::exists('public/' . $data->foto_kk) && $data->foto_kk ? Storage::url($data->foto_kk) : asset('asset/images/landing2.png') }})"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="title">Foto Paspor</div>
                                <div class="banner-image-wrapper">
                                    @if(!empty($data->foto_paspor))
                                        <div class="image" style="background-image: url({{ Storage::exists('public/' . $data->foto_paspor) && $data->foto_paspor ? Storage::url($data->foto_paspor) : '' }})"></div>
                                    @else
                                        <div class="subtitle">-</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection