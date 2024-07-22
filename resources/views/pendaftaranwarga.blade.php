@extends('layouts.master')
@section('title', 'Pendaftaran Warga')

@section('content')
    <!-- ======= Pendaftaran Warga ======= -->
    <section id="pendaftaran-warga" class="features" data-aos="fade-up">
        <div class="container">
            <div class="section-title">
                <h2>Pendaftaran Warga</h2>
            </div>

            <div class="row content">
                <div class="col-md-5" data-aos="fade-right" data-aos-delay="100">
                    <img src="assets/img/identitas.svg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-4" data-aos="fade-left" data-aos-delay="100">

                    <!-- Alert Berhasil -->
                    @if($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                        <div class="card-body bg-light">
                            <form class="form" action="{{ route('pendaftaran-warga.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="col-lg-12 mb-2">
                                    <label for="Nomor NIK" class="form-label">Nomor Kartu Keluarga<span class="text-danger">*</span></label>
                                    <input class="form-control {{ $errors->has('no_kk') ? ' is-invalid' : '' }}" type="text" name="no_kk" id="no_kk" placeholder="Masukkan Nomor Kartu Keluarga.." value="{{ old('no_kk') }}">
    
                                    @error('no_kk')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="Nomor Induk Kependudukan" class="form-label">Nomor Induk Kependudukan<span class="text-danger">*</span></label>
                                    <input class="form-control {{ $errors->has('nik') ? ' is-invalid' : '' }}" type="text" name="nik" id="nik" placeholder="Masukkan Nomor Induk Kependudukan.." value="{{ old('nik') }}">

                                    @error('nik')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="Nama Lengkap" class="form-label">Nama Lengkap<span class="text-danger">*</span></label>
                                    <input class="form-control {{ $errors->has('nama_lengkap') ? ' is-invalid' : '' }}" type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan Nama Lengkap.." value="{{ old('nama_lengkap') }}">

                                    @error('nama_lengkap')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="Nomor Handphone" class="form-label">Nomor Handphone<span class="text-danger">*</span></label>
                                    <input class="form-control {{ $errors->has('no_telp') ? ' is-invalid' : '' }}" type="text" name="no_telp" id="no_telp" placeholder="Masukkan Nomor Handphone.." value="{{ old('no_telp') }}">

                                    @error('no_telp')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="Tempat Lahir" class="form-label">Tempat Lahir<span class="text-danger">*</span></label>
                                    <input class="form-control {{ $errors->has('tempat_lahir') ? ' is-invalid' : '' }}" type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir.." value="{{ old('tempat_lahir') }}">

                                    @error('tempat_lahir')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="Tanggal Lahir" class="form-label">Tanggal Lahir<span class="text-danger">*</span></label>
                                    <input class="form-control {{ $errors->has('tanggal_lahir') ? ' is-invalid' : '' }}" type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">

                                    @error('tanggal_lahir')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="Jenis Kelamin" class="form-label">Jenis Kelamin<span class="text-danger">*</span></label>
                                    <select class="form-control {{ $errors->has('jenis_kelamin') ? ' is-invalid' : '' }}" name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>

                                    @error('jenis_kelamin')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="Tanggal Lahir" class="form-label">Agama<span class="text-danger">*</span></label>
                                    <select class="form-control {{ $errors->has('religions_id') ? ' is-invalid' : '' }}" name="religions_id" id="religions_id">
                                        <option value="" selected disabled>Pilih Agama</option>
                                        @foreach ($religions as $religion)
                                            <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('religions_id')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="Tanggal Lahir" class="form-label">Provinsi<span class="text-danger">*</span></label>
                                    <select class="form-control {{ $errors->has('provinsi') ? ' is-invalid' : '' }}" name="provinsi" id="provinsi">
                                        <option value="" selected disabled>Pilih Provinsi</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->id }}">{{ $province->nama_bps }}</option>
                                        @endforeach
                                    </select>

                                    @error('provinsi')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="kabupaten" class="form-label">Kabupaten<span class="text-danger">*</span></label>
                                    <select class="form-control {{ $errors->has('kabupaten') ? ' is-invalid' : '' }}" name="kabupaten" id="kabupaten">
                                        <option value="0" selected disabled>Pilih Kabupaten / Kota</option>
                                    </select>

                                    @error('kabupaten')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="kecamatan" class="form-label">Kecamatan<span class="text-danger">*</span></label>
                                    <select class="form-control {{ $errors->has('kecamatan') ? ' is-invalid' : '' }}" name="kecamatan" id="kecamatan">
                                        <option value="0" selected disabled>Pilih Kecamatan</option>
                                    </select>

                                    @error('kecamatan')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="kelurahan" class="form-label">Kelurahan<span class="text-danger">*</span></label>
                                    <select class="form-control {{ $errors->has('kelurahan') ? ' is-invalid' : '' }}" name="kelurahan" id="kelurahan">
                                        <option value="0" selected disabled>Pilih Kelurahan</option>
                                    </select>

                                    @error('kelurahan')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="kodePos" class="form-label">Kode Pos<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control {{ $errors->has('kode_pos') ? ' is-invalid' : '' }}" name="kode_pos" id="kode_pos" placeholder="Masukkan Kode Pos.." value="{{ old('kode_pos') }}">

                                    @error('kode_pos')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="alamatLengkap" class="form-label">Alamat Lengkap<span class="text-danger">*</span></label>
                                    <textarea class="form-control {{ $errors->has('alamat') ? ' is-invalid' : '' }}" name="alamat" id="alamat" placeholder="Masukkan Alamat Lengkap..">{{ old('alamat') }}</textarea>

                                    @error('alamat')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="alamatSebelumnya" class="form-label">Alamat Sebelumnya<span class="text-danger">*</span></label>
                                    <textarea class="form-control {{ $errors->has('alamat_sebelumnya') ? ' is-invalid' : '' }}" name="alamat_sebelumnya" id="alamat_sebelumnya" placeholder="Masukkan Alamat Sebelumnya..">{{ old('alamat_sebelumnya') }}</textarea>

                                    @error('alamat_sebelumnya')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="rt" class="form-label">RT<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control {{ $errors->has('rt') ? ' is-invalid' : '' }}" name="rt" id="rt" placeholder="Masukkan RT.." value="{{ old('rt') }}">

                                    @error('rt')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="rw" class="form-label">RW<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control {{ $errors->has('rw') ? ' is-invalid' : '' }}" name="rw" id="rw" placeholder="Masukkan RW.." value="{{ old('rw') }}">

                                    @error('rw')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="pendidikan" class="form-label">Pendidikan<span class="text-danger">*</span></label>
                                    <select class="form-select {{ $errors->has('email') ? ' is-invalid' : '' }}" name="pendidikan">
                                        <option value="" selected disabled>Pilih Pendidikan</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMP</option>
                                        <option value="SMK">SMK</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                    </select>

                                    @error('pendidikan')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="jenisPekerjaan" class="form-label">Jenis Pekerjaan<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control {{ $errors->has('jenis_pekerjaan') ? ' is-invalid' : '' }}" name="jenis_pekerjaan" id="jenis_pekerjaan" placeholder="Masukkan Jenis Pekerjaan.." value="{{ old('jenis_pekerjaan') }}">

                                    @error('jenis_pekerjaan')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="statusPerkawinan" class="form-label">Status Perkawinan<span class="text-danger">*</span></label>
                                    <select class="form-select {{ $errors->has('status_perkawinan') ? ' is-invalid' : '' }}" name="status_perkawinan" id="status_perkawinan">
                                        <option value="" selected disabled>Pilih Status Perkawinan</option>
                                        <option value="0">Belum Menikah</option>
                                        <option value="1">Menikah</option>
                                        <option value="2">Cerai Hidup</option>
                                        <option value="3">Cerai Mati</option>
                                    </select>

                                    @error('status_perkawinan')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="statusDalamKeluarga" class="form-label">Status Dalam Keluarga<span class="text-danger">*</span></label>
                                    <select class="form-select {{ $errors->has('status_dalam_keluarga') ? ' is-invalid' : '' }}" name="status_dalam_keluarga" id="status_dalam_keluarga">
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

                                    @error('status_dalam_keluarga')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan<span class="text-danger">*</span></label>
                                    <select class="form-select {{ $errors->has('kewarganegaraan') ? ' is-invalid' : '' }}" name="kewarganegaraan" id="kewarganegaraan">
                                        <option value="WNI">Warga Negara Indonesia</option>
                                        <option value="WNA">Warga Negara Asing</option>
                                    </select>

                                    @error('kewarganegaraan')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="fotoKK" class="form-label">Foto Kartu Keluarga<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control {{ $errors->has('foto_kk') ? ' is-invalid' : '' }}" name="foto_kk" id="customFile1" placeholder="Masukkan Foto KK..">

                                    @error('foto_kk')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="fotoKTP" class="form-label">Foto KTP<span class="text-danger">*</span></label>
                                    <input type="file" class="form-control {{ $errors->has('foto_ktp') ? ' is-invalid' : '' }}" name="foto_ktp" id="customFile2" placeholder="Masukkan Foto KTP..">

                                    @error('foto_ktp')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="namaAyah" class="form-label">Nama Ayah<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control {{ $errors->has('nama_ayah') ? ' is-invalid' : '' }}" name="nama_ayah" id="nama_ayah" placeholder="Masukkan Nama Ayah.." value="{{ old('nama_ayah') }}">

                                    @error('nama_ayah')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="pekerjaanAyah" class="form-label">Pekerjaan Ayah<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control {{ $errors->has('pekerjaan_ayah') ? ' is-invalid' : '' }}" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah.." value="{{ old('pekerjaan_ayah') }}">

                                    @error('pekerjaan_ayah')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="namaIbu" class="form-label">Nama Ibu<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control {{ $errors->has('nama_ibu') ? ' is-invalid' : '' }}" name="nama_ibu" id="nama_ibu" placeholder="Masukkan Nama Ibu.." value="{{ old('nama_ibu') }}">

                                    @error('nama_ibu')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="pekerjaanIbu" class="form-label">Pekerjaan Ibu<span class="text-danger">*</span></label>
                                    <input type="text" class="form-control {{ $errors->has('pekerjaan_ibu') ? ' is-invalid' : '' }}" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Masukkan Pekerjaan Ibu.." value="{{ old('pekerjaan_ibu') }}">
                                    
                                    @error('pekerjaan_ibu')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="wargaPindahan" class="form-label">Warga Pindahan<span class="text-danger">*</span></label></br>
                                    <input type="radio" id="warga_pindahan" name="warga_pindahan" value="1">
                                    <label for="Ya">Ya</label>
                                    <input type="radio" id="warga_pindahan" name="warga_pindahan" value="0">
                                    <label for="Tidak">Tidak</label>

                                    @error('warga_pindahan')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="bantuanPemerintah" class="form-label">Bantuan Pemerintah<span class="text-danger">*</span></label></br>
                                    <input type="radio" id="bantuan_pemerintah" name="bantuan_pemerintah" value="1">
                                    <label for="Ya">Ya</label>
                                    <input type="radio" id="bantuan_pemerintah" name="bantuan_pemerintah" value="0">
                                    <label for="Tidak">Tidak</label>

                                    @error('bantuan_pemerintah')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-lg-12 mb-2">
                                    <label for="disabilitas" class="form-label">Disabilitas<span class="text-danger">*</span></label></br>
                                    <input type="radio" id="disabilitas" name="disabilitas" value="1">
                                    <label for="Ya">Ya</label>
                                    <input type="radio" id="disabilitas" name="disabilitas" value="0">
                                    <label for="Tidak">Tidak</label>

                                    @error('disabilitas')
                                        <div class="text-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                                </div>
                            </form>
                        </div>
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