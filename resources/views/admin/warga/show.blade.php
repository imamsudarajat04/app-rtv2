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
                                <div class="title">Cita - Cita</div>
                                <div class="subtitle">{{ $data->citaCita }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">Alamat Asal</div>
                                <div class="subtitle">{{ $data->alamatAsal }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">Alamat Sekarang</div>
                                <div class="subtitle">{{ $data->alamatSekarang }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">Agama</div>
                                <div class="subtitle">{{ $data->agama }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">Nama Ayah</div>
                                <div class="subtitle">{{ $data->namaAyah }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">Nama Ibu</div>
                                <div class="subtitle">{{ $data->namaIbu }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">Pekerjaan Ayah</div>
                                <div class="subtitle">{{ $data->pekerjaanAyah }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">Pekerjaan Ibu</div>
                                <div class="subtitle">{{ $data->pekerjaanIbu }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">Jabatan Organisasi</div>
                                <div class="subtitle">{{ $data->jabatanOrganisasi }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">Tahun Organisasi</div>
                                <div class="subtitle">{{ $data->tahunOrganisasi }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="title">Keterangan Organisasi</div>
                                <div class="subtitle">{{ $data->keteranganOrganisasi }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">Prestasi Akademik</div>
                                <div class="subtitle">{{ $data->prestasiAkademik }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="title">Prestasi Non Akademik</div>
                                <div class="subtitle">{{ $data->prestasiNonAkademik }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection