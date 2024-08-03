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

            <!-- Alert Validasi -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="my-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Alert Error -->
            @if($message = Session::get('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Pengisian Data</h5>

                  <form class="row g-3" action="{{ route('DataWarga.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="col-6">
                      <label for="noKK" class="form-label">Nomor KK</label>
                      <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="Masukkan Nomor KK.." value="{{ old('no_kk') }}" >
                    </div>

                    <div class="col-6">
                      <label for="NIK" class="form-label">NIK</label>
                      <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK Sesuai KTP.." value="{{ old('nik') }}" >
                    </div>

                    <div class="col-12">
                      <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan Nama Lengkap.." value="{{ old('nama_lengkap') }}" >
                    </div>

                    <div class="col-12">
                      <label for="Nomor Handphone" class="form-label">Nomor Handphone</label>
                      <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Masukkan Nomor Handphone.." value="{{ old('no_telp') }}" >
                    </div>

                    <div class="col-6">
                        <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir.." value="{{ old('tempat_lahir') }}" >
                    </div>

                    <div class="col-6">
                        <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}" >
                    </div>

                    <div class="col-6">
                        <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                        <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" >
                            <option value="" selected disabled>Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="agama" class="form-label">Agama</label>
                        <select class="form-control" name="religions_id" id="religions_id" >
                            <option value="" selected disabled>Pilih Agama</option>
                            @foreach ($religions as $religion)
                                <option value="{{ $religion->id }}" {{ old('religions_id') == $religion->id ? 'selected' : '' }}>{{ $religion->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="provinsi" class="form-label">Provinsi</label>
                        <select class="form-control" name="provinsi" id="provinsi" data-old="{{ old('provinsi') }}">
                            <option value="" selected disabled>Pilih Provinsi</option>
                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}" {{ old('provinsi') == $province->id ? 'selected' : '' }}>{{ $province->nama_bps }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="kabupaten" class="form-label">Kabupaten</label>
                        <select class="form-control" name="kabupaten" id="kabupaten" data-old="{{ old('kabupaten') }}">
                            <option value="0" selected disabled>Pilih Kabupaten / Kota</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="kecamatan" class="form-label">Kecamatan</label>
                        <select class="form-control" name="kecamatan" id="kecamatan" data-old="{{ old('kecamatan') }}">
                            <option value="0" selected disabled>Pilih Kecamatan</option>
                        </select>
                    </div>

                    <div class="col-6">
                        <label for="kelurahan" class="form-label">Kelurahan</label>
                        <select class="form-control" name="kelurahan" id="kelurahan" data-old="{{ old('kelurahan') }}">
                            <option value="0" selected disabled>Pilih Kelurahan</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label for="kodePos" class="form-label">Kode Pos</label>
                        <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Masukkan Kode Pos.." value="{{ old('kode_pos') }}" >
                    </div>

                    <div class="col-12">
                        <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                        <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat Lengkap.." >{{ old('alamat') }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="alamat_sebelumnya" class="form-label">Alamat Sebelumnya</label>
                        <textarea class="form-control" name="alamat_sebelumnya" id="alamat_sebelumnya" placeholder="Masukkan Alamat Sebelumnya.." >{{ old('alamat') }}</textarea>
                    </div>

                    <div class="col-6">
                        <label for="rt" class="form-label">RT</label>
                        <input type="text" class="form-control" name="rt" id="rt" placeholder="Masukkan RT.." value="{{ old('rt') }}" >
                    </div>

                    <div class="col-6">
                        <label for="rw" class="form-label">RW</label>
                        <input type="text" class="form-control" name="rw" id="rw" placeholder="Masukkan RW.." value="{{ old('rw') }}" >
                    </div>

                    <div class="col-6">
                      <label for="pendidikan" class="form-label">Pendidikan</label>
                      <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Masukkan Pendidikan.." value="{{ old('pendidikan') }}" >
                    </div>

                    <div class="col-6">
                      <label for="jenisPekerjaan" class="form-label">Jenis Pekerjaan</label>
                      <input type="text" class="form-control" name="jenis_pekerjaan" id="jenis_pekerjaan" placeholder="Masukkan Jenis Pekerjaan.." value="{{ old('jenis_pekerjaan') }}" >
                    </div>

                    <div class="col-6">
                        <label for="statusPerkawinan" class="form-label">Status Perkawinan</label>
                        <select class="form-control" name="status_perkawinan" id="status_perkawinan">
                            <option value="" selected disabled>Pilih Status Perkawinan</option>
                            <option value="0" {{ old('status_perkawinan') == '0' ? 'selected' : '' }}>Belum Menikah</option>
                            <option value="1" {{ old('status_perkawinan') == '1' ? 'selected' : '' }}>Menikah</option>
                            <option value="2" {{ old('status_perkawinan') == '2' ? 'selected' : '' }}>Cerai Hidup</option>
                            <option value="3" {{ old('status_perkawinan') == '3' ? 'selected' : '' }}>Cerai Mati</option>
                        </select>

                    </div>

                    <div class="col-6">
                        <label for="statusDalamKeluarga" class="form-label">Status Dalam Keluarga</label>
                        <select class="form-control" name="status_dalam_keluarga" id="status_dalam_keluarga" required>
                            <option value="" selected disabled>Pilih Status Dalam Keluarga</option>
                            <option value="0" {{ old('status_dalam_keluarga') == '0' ? 'selected' : '' }}>Kepala Keluarga</option>
                            <option value="1" {{ old('status_dalam_keluarga') == '1' ? 'selected' : '' }}>Istri</option>
                            <option value="2" {{ old('status_dalam_keluarga') == '2' ? 'selected' : '' }}>Anak</option>
                            <option value="3" {{ old('status_dalam_keluarga') == '3' ? 'selected' : '' }}>Menantu</option>
                            <option value="4" {{ old('status_dalam_keluarga') == '4' ? 'selected' : '' }}>Cucu</option>
                            <option value="5" {{ old('status_dalam_keluarga') == '5' ? 'selected' : '' }}>Orang Tua</option>
                            <option value="6" {{ old('status_dalam_keluarga') == '6' ? 'selected' : '' }}>Mertua</option>
                            <option value="7" {{ old('status_dalam_keluarga') == '7' ? 'selected' : '' }}>Keluarga Lain</option>
                            <option value="8" {{ old('status_dalam_keluarga') == '8' ? 'selected' : '' }}>Pembantu</option>
                            <option value="9" {{ old('status_dalam_keluarga') == '9' ? 'selected' : '' }}>Lainnya</option>
                        </select>

                    </div>

                    <div class="col-12">
                        <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                        <select class="form-control" name="kewarganegaraan" id="kewarganegaraan" required>
                            <option value="WNI" {{ old('kewarganegaraan') == 'WNI' ? 'selected' : '' }}>Warga Negara Indonesia</option>
                            <option value="WNA" {{ old('kewarganegaraan') == 'WNA' ? 'selected' : '' }}>Warga Negara Asing</option>
                        </select>

                    </div>

                    <div class="col-6">
                        <label for="fotoKK" class="form-label">Foto Kartu Keluarga</label>
                        <input type="file" class="form-control" name="foto_kk" id="customFile1" placeholder="Masukkan Foto KK.." >
                    </div>

                    <div class="col-6">
                        <label for="foto_ktp" class="form-label">Foto KTP</label>
                        <input type="file" class="form-control" name="foto_ktp" id="customFile2">
                    </div>

                    <div class="col-6">
                        <label for="namaAyah" class="form-label">Nama Ayah</label>
                        <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Masukkan Nama Ayah.." value="{{ old('nama_ayah') }}" >
                    </div>

                    <div class="col-6">
                        <label for="pekerjaanAyah" class="form-label">Pekerjaan Ayah</label>
                        <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah.." value="{{ old('pekerjaan_ayah') }}" >
                    </div>

                    <div class="col-6">
                        <label for="namaIbu" class="form-label">Nama Ibu</label>
                        <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Masukkan Nama Ibu.." value="{{ old('nama_ibu') }}" >
                    </div>

                    <div class="col-6">
                        <label for="pekerjaanIbu" class="form-label">Pekerjaan Ibu</label>
                        <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Masukkan Pekerjaan Ibu.." value="{{ old('pekerjaan_ibu') }}" >
                    </div>

                    <div class="col-12">
                        <label for="wargaPindahan" class="form-label">Warga Pindahan</label><br>
                        <input type="radio" id="warga_pindahan" name="warga_pindahan" value="1" {{ old('warga_pindahan') == '1' ? 'checked' : '' }}>
                        <label for="Ya">Ya</label>
                        <input type="radio" id="warga_pindahan" name="warga_pindahan" value="0" {{ old('warga_pindahan') == '0' ? 'checked' : '' }}>
                        <label for="Tidak">Tidak</label><br>

                    </div>

                    <div class="col-12">
                        <label for="bantuanPemerintah" class="form-label">Bantuan Pemerintah</label><br>
                        <input type="radio" id="bantuan_pemerintah" name="bantuan_pemerintah" value="1" {{ old('bantuan_pemerintah') == '1' ? 'checked' : '' }}>
                        <label for="Ya">Ya</label>
                        <input type="radio" id="bantuan_pemerintah" name="bantuan_pemerintah" value="0" {{ old('bantuan_pemerintah') == '0' ? 'checked' : '' }}>
                        <label for="Tidak">Tidak</label><br>
                    </div>

                    <div class="col-12">
                        <label for="disabilitas" class="form-label">Disabilitas</label><br>
                        <input type="radio" id="disabilitas" name="disabilitas" value="1" {{ old('disabilitas') == '1' ? 'checked' : '' }}>
                        <label for="Ya">Ya</label>
                        <input type="radio" id="disabilitas" name="disabilitas" value="0" {{ old('disabilitas') == '0' ? 'checked' : '' }}>
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
        let fileName = $(this).val();
        //clean fake path
        let cleanFileName = fileName.replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(cleanFileName);
    });

    $('#customFile2').on('change', function() {
        //get the file name
        let fileName = $(this).val();
        //clean fake path
        let cleanFileName = fileName.replace('C:\\fakepath\\', " ");
        //replace the "Choose a file" label
        $(this).next('.custom-file-label').html(cleanFileName);
    });

    $(document).ready(function() {
        function populateSelect(selectElement, data, oldValue, defaultText) {
            selectElement.empty();
            selectElement.append('<option value="0" disabled>' + defaultText + '</option>');
            $.each(data, function(key, value) {
                const isSelected = oldValue == key ? 'selected' : '';
                selectElement.append('<option value="' + key + '" ' + isSelected + '>' + value + '</option>');
            });
        }

        $('select[name="provinsi"]').on('change', function() {
            const ProvinceID = $(this).val();
            if (ProvinceID) {
                $.ajax({
                    url: '/getKabupaten/' + ProvinceID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        const oldKabupaten = $('select[name="kabupaten"]').data('old');
                        const selectNameKabupaten = $('select[name="kabupaten"]');
                        populateSelect(selectNameKabupaten, data, oldKabupaten, 'Pilih Kabupaten / Kota');

                        // Trigger kabupaten change if old value exists
                        if (oldKabupaten) {
                            selectNameKabupaten.val(oldKabupaten).trigger('change');
                        }
                    }
                });
            } else {
                $('select[name="kabupaten"]').empty().append('<option value="0" disabled>Pilih Kabupaten / Kota</option>');
            }
        });

        $('select[name="kabupaten"]').on('change', function() {
            const CitiesID = $(this).val();
            if (CitiesID) {
                $.ajax({
                    url: '/getKecamatan/' + CitiesID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        const oldKecamatan = $('select[name="kecamatan"]').data('old');
                        const selectNameKecamatan = $('select[name="kecamatan"]');
                        populateSelect(selectNameKecamatan, data, oldKecamatan, 'Pilih Kecamatan');

                        // Trigger kecamatan change if old value exists
                        if (oldKecamatan) {
                            selectNameKecamatan.val(oldKecamatan).trigger('change');
                        }
                    }
                });
            } else {
                $('select[name="kecamatan"]').empty().append('<option value="0" disabled>Pilih Kecamatan</option>');
            }
        });

        $('select[name="kecamatan"]').on('change', function() {
            const WardID = $(this).val();
            if (WardID) {
                $.ajax({
                    url: '/getKelurahan/' + WardID,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        const oldKelurahan = $('select[name="kelurahan"]').data('old');
                        const selectNameKelurahan = $('select[name="kelurahan"]');
                        populateSelect(selectNameKelurahan, data, oldKelurahan, 'Pilih Kelurahan');
                    }
                });
            } else {
                $('select[name="kelurahan"]').empty().append('<option value="0" disabled>Pilih Kelurahan</option>');
            }
        });

        // Trigger the change events to load the old values if they exist
        const oldProvinsi = $('select[name="provinsi"]').data('old');
        if (oldProvinsi) {
            $('select[name="provinsi"]').val(oldProvinsi).trigger('change');
        }
    });

</script>
@endpush
