@extends('admin.layouts.master')

@section('title', 'Admin | Halaman Tambah Warga')

@section('content')
<div class="pagetitle">
    <h1>Formulir Warga Baru</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
        <li class="breadcrumb-item">Form</li>
        <li class="breadcrumb-item active">Warga Baru</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

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
                    
                  <h5 class="card-title">Pengisian Data</h5>
    
                  <form class="row g-3" action="{{ route('DataWarga.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="col-6">
                      <label for="noKK" class="form-label">Nomor KK</label>
                      <input type="number" class="form-control" name="no_kk" id="no_kk" placeholder="Masukkan Nomor KK.." value="{{ old('no_kk') }}" required>
                    </div>

                    <div class="col-6">
                      <label for="NIK" class="form-label">NIK</label>
                      <input type="number" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK Sesuai KTP.." value="{{ old('nik') }}" required>
                    </div>

                    <div class="col-12">
                      <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                      <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Lengkap.." value="{{ old('name') }}" required>
                    </div>

                    <div class="col-6">
                        <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir.." value="{{ old('tempat_lahir') }}" required>
                    </div>

                    <div class="col-6">
                        <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                    </div>

                    <div class="col-12">
                        <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="agama" class="form-label">Agama</label>
                        <select class="form-control" name="agama" id="agama" required>
                            <option value="" selected disabled>Pilih Agama</option>
                            @foreach ($religions as $religion)
                                <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <select class="form-control" name="provinsi" id="provinsi" required>
                            <option value="" selected disabled>Pilih Provinsi</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="kabupaten" class="form-label">Kabupaten</label>
                        <select class="form-control" name="kabupaten" id="kabupaten" required>
                            <option value="" selected disabled>Pilih Kabupaten</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <select class="form-control" name="kecamatan" id="kecamatan" required>
                            <option value="" selected disabled>Pilih Kecamatan</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="kelurahan" class="form-label">Kelurahan</label>
                        <select class="form-control" name="kelurahan" id="kelurahan" required>
                            <option value="" selected disabled>Pilih Kelurahan</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="kodePos" class="form-label">Kode Pos</label>
                        <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Masukkan Kode Pos.." value="{{ old('kode_pos') }}" required>
                    </div>

                    <div class="col-12">
                        <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat Lengkap.." required>{{ old('alamat') }}</textarea>
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
                      <label for="pendidikan" class="form-label">Pendidikan</label>
                      <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Masukkan Pendidikan.." value="{{ old('pendidikan') }}" required>
                    </div>

                    <div class="col-12">
                      <label for="jenisPekerjaan" class="form-label">Jenis Pekerjaan</label>
                      <input type="text" class="form-control" name="jenis_pekerjaan" id="jenis_pekerjaan" placeholder="Masukkan Jenis Pekerjaan.." value="{{ old('jenis_pekerjaan') }}" required>
                    </div>

                    <div class="col-12">
                        <label for="statusPerkawinan" class="form-label">Status Perkawinan</label>
                        <select class="form-control" name="status_perkawinan" id="status_perkawinan" required>
                            <option value="" selected disabled>Pilih Status Perkawinan</option>
                            <option value="0">Belum Menikah</option>
                            <option value="1">Menikah</option>
                            <option value="2">Cerai Hidup</option>
                            <option value="3">Cerai Mati</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="statusDalamKeluarga" class="form-label">Status Dalam Keluarga</label>
                        <select class="form-control" name="status_dalam_keluarga" id="status_dalam_keluarga" required>
                            <option value="" selected disabled>Pilih Status Dalam Keluarga</option>
                            <option value="0">Kepala Keluarga</option>
                            <option value="1">Istri</option>
                            <option value="2">Anak</option>
                            <option value="3">Menantu</option>
                            <option value="4">Cucu</option>
                            <option value="5">Orang Tua</option>
                            <option value="6">Mertua</option>
                            <option value="7">Keluarga Lain</option>
                            <option value="8">Pembantu</option>
                            <option value="9">Lainnya</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                        <select class="form-control" name="kewarganegaraan" id="kewarganegaraan" required>
                            <option value="WNI">Warga Negara Indonesia</option>
                            <option value="WNA">Warga Negara Asing</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="fotoKK" class="form-label">Foto Kartu Keluarga</label>
                        <input type="file" class="form-control" name="foto_kk" id="customFile1" placeholder="Masukkan Foto KK.." required>
                    </div>

                    <div class="col-6">
                        <label for="noKK" class="form-label">Nomor Paspor</label>
                        <input type="text" class="form-control" name="no_paspor" id="no_paspor" placeholder="Masukkan Nomor Paspor (Jika Ada) .." value="{{ old('no_paspor') }}">
                    </div>

                    <div class="col-6">
                        <label for="NIK" class="form-label">Nomor Kitas Kitap</label>
                        <input type="text" class="form-control" name="no_kitas_kitap" id="no_kitas_kitap" placeholder="Masukkan Nomor Kitas Kitap (Jika Ada) .." value="{{ old('no_kitas_kitap') }}">
                    </div>

                    <div class="col-12">
                        <label for="fotoKK" class="form-label">Foto Paspor*</label>
                        <input type="file" class="form-control" name="foto_paspor" id="customFile2">
                    </div>

                    <div class="text-center">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <a href="{{ route('DataWarga.index') }}" class="btn btn-danger">Kembali</a>
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

    $('#customFile2').on('change', function() {
        //get the file name
        var fileName = $(this).val();
        //clean fake path
        var cleanFileName = fileName.replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(cleanFileName);
    });
</script>
@endpush