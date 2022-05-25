@extends('layouts.master')
@section('title', 'Pendaftaran Warga')

@section('content')
    <!-- ======= Pendaftaran Warga ======= -->
    <section id="pendaftaran-warga" class="features" data-aos="fade-up">
        <div class="container">
            <div class="section-title">
                <h2>Pendaftaran Warga</h2>
                {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
            </div>

            <div class="row content">
                <div class="col-md-5" data-aos="fade-right" data-aos-delay="100">
                    <img src="assets/img/identitas.svg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-4" data-aos="fade-left" data-aos-delay="100">

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
                        <div class="card-body bg-light">
                            <form class="form" action="{{ route('pendaftaran-warga.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <label for="Nomor NIK" class="form-label">Nomor Kartu Keluarga</label>
                                <input class="form-control" type="text" name="no_kk" id="no_kk" placeholder="Masukkan Nomor Kartu Keluarga.." value="{{ old('no_kk') }}"></br>

                                <label for="Nomor Induk Kependudukan" class="form-label">Nomor Induk Kependudukan</label>
                                <input class="form-control" type="text" name="nik" id="nik" placeholder="Masukkan Nomor Induk Kependudukan.." value="{{ old('nik') }}"></br>

                                <label for="Nama Lengkap" class="form-label">Nama Lengkap</label>
                                <input class="form-control" type="text" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan Nama Lengkap.." value="{{ old('nama_lengkap') }}"></br>

                                <label for="Tempat Lahir" class="form-label">Tempat Lahir</label>
                                <input class="form-control" type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir.." value="{{ old('tempat_lahir') }}"></br>

                                <label for="Tanggal Lahir" class="form-label">Tanggal Lahir</label>
                                <input class="form-control" type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}"></br>

                                <label for="Jenis Kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select></br>

                                <label for="Tanggal Lahir" class="form-label">Agama</label>
                                <select class="form-control" name="religions_id" id="religions_id">
                                    <option value="" selected disabled>Pilih Agama</option>
                                    @foreach ($religions as $religion)
                                        <option value="{{ $religion->id }}">{{ $religion->name }}</option>
                                    @endforeach
                                </select></br>

                                <label for="Tanggal Lahir" class="form-label">Provinsi</label>
                                <select class="form-control" name="provinsi" id="provinsi">
                                    <option value="" selected disabled>Pilih Provinsi</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}">{{ $province->nama_bps }}</option>
                                    @endforeach
                                </select></br>

                                <label for="kabupaten" class="form-label">Kabupaten</label>
                                <select class="form-control" name="kabupaten" id="kabupaten">
                                    <option value="0" selected disabled>Pilih Kabupaten / Kota</option>
                                </select></br>

                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <select class="form-control" name="kecamatan" id="kecamatan">
                                    <option value="0" selected disabled>Pilih Kecamatan</option>
                                </select></br>

                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                <select class="form-control" name="kelurahan" id="kelurahan">
                                    <option value="0" selected disabled>Pilih Kelurahan</option>
                                </select></br>

                                <label for="kodePos" class="form-label">Kode Pos</label>
                                <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Masukkan Kode Pos.." value="{{ old('kode_pos') }}"></br>

                                <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat Lengkap..">{{ old('alamat') }}</textarea></br>

                                <label for="rt" class="form-label">RT</label>
                                <input type="text" class="form-control" name="rt" id="rt" placeholder="Masukkan RT.." value="{{ old('rt') }}"></br>

                                <label for="rw" class="form-label">RW</label>
                                <input type="text" class="form-control" name="rw" id="rw" placeholder="Masukkan RW.." value="{{ old('rw') }}"></br>

                                <label for="pendidikan" class="form-label">Pendidikan</label>
                                <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Masukkan Pendidikan.." value="{{ old('pendidikan') }}"></br>

                                <label for="jenisPekerjaan" class="form-label">Jenis Pekerjaan</label>
                                <input type="text" class="form-control" name="jenis_pekerjaan" id="jenis_pekerjaan" placeholder="Masukkan Jenis Pekerjaan.." value="{{ old('jenis_pekerjaan') }}"></br>

                                <label for="statusPerkawinan" class="form-label">Status Perkawinan</label>
                                <select class="form-control" name="status_perkawinan" id="status_perkawinan">
                                    <option value="" selected disabled>Pilih Status Perkawinan</option>
                                    <option value="0">Belum Menikah</option>
                                    <option value="1">Menikah</option>
                                    <option value="2">Cerai Hidup</option>
                                    <option value="3">Cerai Mati</option>
                                </select></br>

                                <label for="statusDalamKeluarga" class="form-label">Status Dalam Keluarga</label>
                                <select class="form-control" name="status_dalam_keluarga" id="status_dalam_keluarga">
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
                                </select></br>

                                <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                <select class="form-control" name="kewarganegaraan" id="kewarganegaraan">
                                    <option value="WNI">Warga Negara Indonesia</option>
                                    <option value="WNA">Warga Negara Asing</option>
                                </select></br>

                                <label for="fotoKK" class="form-label">Foto Kartu Keluarga</label>
                                <input type="file" class="form-control" name="foto_kk" id="customFile1" placeholder="Masukkan Foto KK.."></br>

                                <label for="noPaspor" class="form-label">Nomor Paspor</label>
                                <input type="text" class="form-control" name="no_paspor" id="no_paspor" placeholder="Masukkan Nomor Paspor (Jika Ada) .." value="{{ old('no_paspor') }}"></br>

                                <label for="noKitasKitap" class="form-label">Nomor Kitas Kitap</label>
                                <input type="text" class="form-control" name="no_kitas_kitap" id="no_kitas_kitap" placeholder="Masukkan Nomor Kitas Kitap (Jika Ada) .." value="{{ old('no_kitas_kitap') }}"></br>

                                <label for="fotoPaspor" class="form-label">Foto Paspor*</label>
                                <input type="file" class="form-control" name="foto_paspor" id="customFile2"></br>

                                <label for="namaAyah" class="form-label">Nama Ayah</label>
                                <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Masukkan Nama Ayah.." value="{{ old('nama_ayah') }}"></br>

                                <label for="pekerjaanAyah" class="form-label">Pekerjaan Ayah</label>
                                <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah.." value="{{ old('pekerjaan_ayah') }}"></br>
                                
                                <label for="namaIbu" class="form-label">Nama Ibu</label>
                                <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Masukkan Nama Ibu.." value="{{ old('nama_ibu') }}"></br>

                                <label for="pekerjaanIbu" class="form-label">Pekerjaan Ibu</label>
                                <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Masukkan Pekerjaan Ibu.." value="{{ old('pekerjaan_ibu') }}"></br>

                                <label for="wargaPindahan" class="form-label">Warga Pindahan</label></br>
                                <input type="radio" id="warga_pindahan" name="warga_pindahan" value="1">
                                <label for="Ya">Ya</label>
                                <input type="radio" id="warga_pindahan" name="warga_pindahan" value="0">
                                <label for="Tidak">Tidak</label><br></br>

                                <label for="bantuanPemerintah" class="form-label">Bantuan Pemerintah</label></br>
                                <input type="radio" id="bantuan_pemerintah" name="bantuan_pemerintah" value="1">
                                <label for="Ya">Ya</label>
                                <input type="radio" id="bantuan_pemerintah" name="bantuan_pemerintah" value="0">
                                <label for="Tidak">Tidak</label><br></br>

                                <label for="disabilitas" class="form-label">Disabilitas</label></br>
                                <input type="radio" id="disabilitas" name="disabilitas" value="1">
                                <label for="Ya">Ya</label>
                                <input type="radio" id="disabilitas" name="disabilitas" value="0">
                                <label for="Tidak">Tidak</label><br>

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