@extends('admin.layouts.master')

@section('title', 'Admin | Halaman Edit Data Warga')

@section('content')
<div class="pagetitle">
    <h1>Formulir Edit Data Warga</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
        <li class="breadcrumb-item">Form</li>
        <li class="breadcrumb-item active">Edit Data Warga</li>
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
    
                  <form class="row g-3" action="{{ route('DataWarga.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="col-6">
                      <label for="noKK" class="form-label">Nomor KK</label>
                      <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="Masukkan Nomor KK.." value="{{ old('no_kk', $data->no_kk) }}" readonly>
                    </div>

                    <div class="col-6">
                      <label for="NIK" class="form-label">NIK</label>
                      <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK Sesuai KTP.." value="{{ old('nik', $data->nik) }}" required>
                    </div>

                    <div class="col-12">
                      <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan Nama Lengkap.." value="{{ old('nama_lengkap', $data->nama_lengkap) }}" required>
                    </div>

                    <div class="col-12">
                      <label for="Nomor Handphone" class="form-label">Nomor Handphone</label>
                      <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Masukkan Nomor Handphone.." value="{{ old('no_telp', $data->no_telp) }}" required>
                    </div>

                    <div class="col-6">
                        <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir.." value="{{ old('tempat_lahir', $data->tempat_lahir) }}" required>
                    </div>

                    <div class="col-6">
                        <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}" required>
                    </div>

                    <div class="col-12">
                        <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" required>
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="agama" class="form-label">Agama</label>
                        <select class="form-control" name="religions_id" id="religions_id" required>
                            <option value="0" selected disabled>Pilih Agama</option>
                            @foreach ($religions as $religion)
                                <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                @if($religion->id == $data->religions_id)
                                    <script>
                                        document.getElementById('religions_id').value = "{{ $religion->id }}";
                                    </script>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <select class="form-control" name="provinsi" id="provinsi" required>
                            <option value="0" selected disabled>Pilih Provinsi</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->nama_bps }}</option>
                                @if($province->id == $data->provinsi)
                                    <script>
                                        document.getElementById('provinsi').value = "{{ $province->id }}";
                                    </script>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="kabupaten" class="form-label">Kabupaten</label>
                        <select class="form-control" name="kabupaten" id="kabupaten" required>
                            <option value="0" selected disabled>Pilih Kabupaten / Kota</option>
                            @foreach ($regencies as $regency)
                                <option value="{{ $regency->id }}">{{ $regency->nama_dagri }}</option>
                                @if($regency->id == $data->kabupaten)
                                    <script>
                                        document.getElementById('kabupaten').value = "{{ $regency->id }}";
                                    </script>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <select class="form-control" name="kecamatan" id="kecamatan" required>
                            <option value="0" selected disabled>Pilih Kecamatan</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->nama_bps }}</option>
                                @if($district->id == $data->kecamatan)
                                    <script>
                                        document.getElementById('kecamatan').value = "{{ $district->id }}";
                                    </script>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="kelurahan" class="form-label">Kelurahan</label>
                        <select class="form-control" name="kelurahan" id="kelurahan" required>
                            <option value="0" selected disabled>Pilih Kelurahan</option>
                            @foreach ($villages as $village)
                                <option value="{{ $village->id }}">{{ $village->nama_bps }}</option>
                                @if($village->id == $data->kelurahan)
                                    <script>
                                        document.getElementById('kelurahan').value = "{{ $village->id }}";
                                    </script>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="kodePos" class="form-label">Kode Pos</label>
                        <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Masukkan Kode Pos.." value="{{ old('kode_pos', $data->kode_pos) }}" required>
                    </div>

                    <div class="col-12">
                        <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat Lengkap.." required>{{ old('alamat', $data->alamat) }}</textarea>
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
                      <label for="pendidikan" class="form-label">Pendidikan</label>
                      <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Masukkan Pendidikan.." value="{{ old('pendidikan', $data->pendidikan) }}" required>
                    </div>

                    <div class="col-12">
                      <label for="jenisPekerjaan" class="form-label">Jenis Pekerjaan</label>
                      <input type="text" class="form-control" name="jenis_pekerjaan" id="jenis_pekerjaan" placeholder="Masukkan Jenis Pekerjaan.." value="{{ old('jenis_pekerjaan', $data->jenis_pekerjaan) }}" required>
                    </div>

                    <div class="col-12">
                        <label for="statusPerkawinan" class="form-label">Status Perkawinan</label>
                        <select class="form-control" name="status_perkawinan" id="status_perkawinan" required>
                            <option value="" selected disabled>Pilih Status Perkawinan</option>
                            <option value="0" @if($data->status_perkawinan == 0) selected @endif>Belum Menikah</option>
                            <option value="1" @if($data->status_perkawinan == 1) selected @endif>Kawin</option>
                            <option value="2" @if($data->status_perkawinan == 2) selected @endif>Cerai Hidup</option>
                            <option value="3" @if($data->status_perkawinan == 3) selected @endif>Cerai Mati</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="statusDalamKeluarga" class="form-label">Status Dalam Keluarga</label>
                        <select class="form-control" name="status_dalam_keluarga" id="status_dalam_keluarga" required>
                            <option value="" selected disabled>Pilih Status Dalam Keluarga</option>
                            <option value="0" @if($data->status_dalam_keluarga == 0) selected @endif>Kepala Keluarga</option>
                            <option value="1" @if($data->status_dalam_keluarga == 1) selected @endif>Istri</option>
                            <option value="2" @if($data->status_dalam_keluarga == 2) selected @endif>Anak</option>
                            <option value="3" @if($data->status_dalam_keluarga == 3) selected @endif>Menantu</option>
                            <option value="4" @if($data->status_dalam_keluarga == 4) selected @endif>Cucu</option>
                            <option value="5" @if($data->status_dalam_keluarga == 5) selected @endif>Orang Tua</option>
                            <option value="6" @if($data->status_dalam_keluarga == 6) selected @endif>Mertua</option>
                            <option value="7" @if($data->status_dalam_keluarga == 7) selected @endif>Keluarga Lain</option>
                            <option value="8" @if($data->status_dalam_keluarga == 8) selected @endif>Pembantu</option>
                            <option value="9" @if($data->status_dalam_keluarga == 9) selected @endif>Lainnya</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                        <select class="form-control" name="kewarganegaraan" id="kewarganegaraan" required>
                            <option value="WNI" @if($data->kewarganegaraan == 'WNI') selected @endif>Warga Negara Indonesia</option>
                            <option value="WNA" @if($data->kewarganegaraan == 'WNA') selected @endif>Warga Negara Asing</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="fotoKK" class="form-label">Foto Kartu Keluarga</label>
                        <input type="file" class="form-control" name="foto_kk" id="customFile1" placeholder="Masukkan Foto KK..">
                    </div>

                    <div class="col-6">
                        <label for="noPaspor" class="form-label">Nomor Paspor</label>
                        <input type="text" class="form-control" name="no_paspor" id="no_paspor" placeholder="Masukkan Nomor Paspor (Jika Ada) .." value="{{ old('no_paspor', $data->no_paspor) }}">
                    </div>

                    <div class="col-6">
                        <label for="noKitasKitap" class="form-label">Nomor Kitas Kitap</label>
                        <input type="text" class="form-control" name="no_kitas_kitap" id="no_kitas_kitap" placeholder="Masukkan Nomor Kitas Kitap (Jika Ada) .." value="{{ old('no_kitas_kitap', $data->no_kitas_kitap) }}">
                    </div>

                    <div class="col-12">
                        <label for="fotoPaspor" class="form-label">Foto Paspor*</label>
                        <input type="file" class="form-control" name="foto_paspor" id="customFile2">
                    </div>

                    <div class="col-6">
                        <label for="namaAyah" class="form-label">Nama Ayah</label>
                        <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Masukkan Nama Ayah.." value="{{ old('nama_ayah', $data->nama_ayah) }}" required>
                    </div>

                    <div class="col-6">
                        <label for="pekerjaanAyah" class="form-label">Pekerjaan Ayah</label>
                        <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah.." value="{{ old('pekerjaan_ayah', $data->pekerjaan_ayah) }}" required>
                    </div>

                    <div class="col-6">
                        <label for="namaIbu" class="form-label">Nama Ibu</label>
                        <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Masukkan Nama Ibu.." value="{{ old('nama_ibu', $data->nama_ibu) }}" required>
                    </div>

                    <div class="col-6">
                        <label for="pekerjaanIbu" class="form-label">Pekerjaan Ibu</label>
                        <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Masukkan Pekerjaan Ibu.." value="{{ old('pekerjaan_ibu', $data->pekerjaan_ibu) }}" required>
                    </div>

                    <div class="col-12">
                        <label for="bantuanPemerintah" class="form-label">Warga Pindahan</label></br>
                        <input type="radio" id="warga_pindahan" name="warga_pindahan" value="1" @if($data->warga_pindahan == 1) checked @endif>
                        <label for="Ya">Ya</label>
                        <input type="radio" id="warga_pindahan" name="warga_pindahan" value="0" @if($data->warga_pindahan == 0) checked @endif>
                        <label for="Tidak">Tidak</label><br> 
                    </div>

                    <div class="col-12">
                        <label for="bantuanPemerintah" class="form-label">Bantuan Pemerintah</label></br>
                        <input type="radio" id="bantuan_pemerintah" name="bantuan_pemerintah" value="1" @if($data->bantuan_pemerintah == 1) checked @endif>
                        <label for="Ya">Ya</label>
                        <input type="radio" id="bantuan_pemerintah" name="bantuan_pemerintah" value="0" @if($data->bantuan_pemerintah == 0) checked @endif>
                        <label for="Tidak">Tidak</label><br>
                    </div>

                    <div class="col-12">
                        <label for="disabilitas" class="form-label">Disabilitas</label></br>
                        <input type="radio" id="disabilitas" name="disabilitas" value="1" @if($data->disabilitas == 1) checked @endif>
                        <label for="Ya">Ya</label>
                        <input type="radio" id="disabilitas" name="disabilitas" value="0" @if($data->disabilitas == 0) checked @endif>
                        <label for="Tidak">Tidak</label><br>
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

    $(document).ready(function() {
        $('select[name="provinsi"]').on('change', function() {
            var ProvinceID = $(this).val();
            if(ProvinceID) {
                $.ajax({
                    url: '/getKabupaten/' + ProvinceID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {         
                        $('select[name="kabupaten"]').empty();
						$('select[name="kabupaten"]').append('<option value="0">Pilih Kabupaten / Kota</option>');
                        $.each(data, function(key, value) {
                            $('select[name="kabupaten"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="kabupaten"]').empty();
            }
        });

        $('select[name="kabupaten"]').on('change', function() {
            var CitiesID = $(this).val();
            if(CitiesID) {
                $.ajax({
                    url: '/getKecamatan/' + CitiesID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {         
                        $('select[name="kecamatan"]').empty();
						$('select[name="kecamatan"]').append('<option value="0">Pilih Kecamatan</option>');
                        $.each(data, function(key, value) {
                            $('select[name="kecamatan"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="kecamatan"]').empty();
            }
        });

        $('select[name="kecamatan"]').on('change', function() {
            var WardID = $(this).val();
            if(WardID) {
                $.ajax({
                    url: '/getKelurahan/' + WardID,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {         
                        $('select[name="kelurahan"]').empty();
						$('select[name="kelurahan"]').append('<option value="0">Pilih Kelurahan</option>');
                        $.each(data, function(key, value) {
                            $('select[name="kelurahan"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="kelurahan"]').empty();
            }
        });
    });
</script>
@endpush