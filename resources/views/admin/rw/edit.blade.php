@extends('admin.layouts.master')

@section('title', 'Admin | Halaman Edit Data RW')

@section('content')
<div class="pagetitle">
    <h1>Formulir Edit Data RW</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
        <li class="breadcrumb-item">Form</li>
        <li class="breadcrumb-item active">Edit Data RW</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <!-- Alert -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="my-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Pengisian Data</h5>
    
                  <form class="row g-3" action="{{ route('DataRW.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <label for="NIK" class="form-label">NIK</label>
                        <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK Sesuai KTP.." value="{{ old('nik', $data->nik) }}" readonly>
                      </div>
                      <div class="col-12">
                        <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Lengkap.." value="{{ old('name', $data->name) }}" required>
                      </div>
                      <div class="col-6">
                          <label for="rt" class="form-label">RT</label>
                          <input type="text" class="form-control" name="rt" id="rt" placeholder="Masukkan RT.." value="{{ old('rt', $data->rt) }}" required>
                      </div>
                      <div class="col-6">
                          <label for="rw" class="form-label">RW</label>
                          <input type="text" class="form-control" name="rw" id="rw" placeholder="Masukkan RW.." value="{{ old('rw', $data->rw) }}" required>
                      </div>
                      <div class="col-12">
                          <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                          <input type="text" class="form-control" name="address" id="address" placeholder="Masukkan Alamat Lengkap.." value="{{ old('address', $data->address) }}" required>
                      </div>
                      <div class="col-12">
                        <label for="Phone" class="form-label">Nomor Handphone</label>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Masukkan Nomor Handpone.." value="{{ old('phone', $data->phone) }}" required>
                      </div>
                      <div class="col-12">
                        <label for="Kelurahan" class="form-label">Kelurahan</label>
                        <input type="text" class="form-control" name="village" id="village" placeholder="Masukkan Kelurahan.." value="{{ old('village', $data->village) }}" required>
                      </div>
                      <div class="col-12">
                        <label for="Kecamatan" class="form-label">Kecamatan</label>
                        <input type="text" class="form-control" name="districts" id="districts" placeholder="Masukkan Kecamatan.." value="{{ old('districts', $data->districts) }}" required>
                      </div>
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <a href="{{ route('DataAkun.index') }}" class="btn btn-danger">Kembali</a>
                    </div>
                  </form>
    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection