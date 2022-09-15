@extends('admin.layouts.master')

@section('title', 'Admin | Halaman Tambah Akun')

@section('content')
<div class="pagetitle">
    <h1>Formulir Akun Baru</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
        <li class="breadcrumb-item">Form</li>
        <li class="breadcrumb-item active">Akun Baru</li>
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
    
                  <form class="row g-3" action="{{ route('DataAkun.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="col-12">
                      <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Lengkap.." value="{{ old('name') }}" required>
                    </div>
                    <div class="col-12">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username.." value="{{ old('username') }}" required>
                    </div>
                    <div class="col-12">
                      <label for="username" class="form-label">Nomor Handphone</label>
                      <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Masukkan Nomor Handpone.." value="{{ old('no_hp') }}" required>
                    </div>
                    <div class="col-6">
                        <label for="rt" class="form-label">RT</label>
                        <input type="text" class="form-control" name="rt" id="rt" placeholder="Masukkan RT.." value="{{ old('rt') }}" required>
                    </div>
                    <div class="col-6">
                        <label for="rw" class="form-label">RW</label>
                        <input type="text" class="form-control" name="rw" id="rw" placeholder="Masukkan RW.." value="{{ old('rw') }}" required>
                    </div>
                    <div class="col-12">
                        <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="Masukkan Alamat Lengkap.." value="{{ old('address') }}" required>
                    </div>
                    <div class="col-12">
                      <label for="Password" class="form-label">Password</label>
                      <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password.." required>
                    </div>
                    <div class="col-12">
                        <label for="Password" class="form-label">Konfirmasi Password</label>
                        <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password.." required>
                    </div>
                    <div class="col-12">
                        <label for="foto" class="form-label">Avatar</label>
                        <input type="file" class="form-control" name="avatar" id="customFile1" placeholder="Masukkan Avatar..">
                    </div>
                    <div class="col-12">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-control" name="role" id="role" required>
                            <option value="" selected disabled>Pilih Role</option>
                            <option value="superadmin">Superadmin</option>
                            <option value="rt">RT</option>
                        </select>
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

@push('customjs')
<script>
    $('#customFile1').on('change', function() {
        //get the file name
        var fileName = $(this).val();
        //clean fake path
        var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(cleanFileName);
    });
</script>
@endpush