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

                <!-- Alert Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="my-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Alert Success -->
                @if($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Alert Failed -->
                @if($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Alert Info -->
                @if($message = Session::get('info'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pengisian Data</h5>

                        <form class="row g-3" action="{{ route('DataWarga.UpdateVerification', $data->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="col-6">
                                <label for="noKK" class="form-label">Nomor KK</label>
                                <input type="text" class="form-control" name="no_kk" id="no_kk" placeholder="Masukkan Nomor KK.." value="{{ old('no_kk', $data->no_kk) }}" readonly>
                            </div>

                            <div class="col-6">
                                <label for="NIK" class="form-label">NIK</label>
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="Masukkan NIK Sesuai KTP.." value="{{ old('nik', $data->nik) }}" readonly>
                            </div>

                            <div class="col-12">
                                <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Masukkan Nama Lengkap.." value="{{ old('nama_lengkap', $data->nama_lengkap) }}" readonly>
                            </div>

                            <div class="col-12">
                                <label for="Nomor Handphone" class="form-label">Nomor Handphone</label>
                                <input type="text" class="form-control" name="no_telp" id="no_telp" placeholder="Masukkan Nomor Handphone.." value="{{ old('no_telp', $data->no_telp) }}" readonly>
                            </div>

                            <div class="col-6">
                                <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir.." value="{{ old('tempat_lahir', $data->tempat_lahir) }}" readonly>
                            </div>

                            <div class="col-6">
                                <label for="tanggalLahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $data->tanggal_lahir) }}" readonly>
                            </div>

                            <div class="col-6">
                                <label for="jenisKelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" name="jenis_kelamin" id="jenis_kelamin" disabled>
                                    <option value="" selected disabled>Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                                    <option value="Perempuan" {{ old('jenis_kelamin', $data->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <div class="col-6">
                                <label for="agama" class="form-label">Agama</label>
                                <select class="form-select" name="religions_id" id="religions_id" disabled>
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

                            <div class="col-6">
                                <label for="provinsi" class="form-label">Provinsi</label>
                                <select class="form-select" name="provinsi" id="provinsi" data-old="{{ old('provinsi', $data->provinsi) }}" disabled>
                                    <option value="0" selected disabled>Pilih Provinsi</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->id }}" {{ old('provinsi', $data->provinsi) == $province->id ? 'selected' : '' }}>{{ $province->nama_bps }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-6">
                                <label for="kabupaten" class="form-label">Kabupaten</label>
                                <select class="form-select" name="kabupaten" id="kabupaten" data-old="{{ old('kabupaten', $data->kabupaten) }}" disabled>
                                    <option value="0" selected disabled>Pilih Kabupaten / Kota</option>
                                </select>
                            </div>

                            <div class="col-6">
                                <label for="kecamatan" class="form-label">Kecamatan</label>
                                <select class="form-select" name="kecamatan" id="kecamatan" data-old="{{ old('kecamatan', $data->kecamatan) }}" disabled>
                                    <option value="0" selected disabled>Pilih Kecamatan</option>
                                </select>
                            </div>

                            <div class="col-6">
                                <label for="kelurahan" class="form-label">Kelurahan</label>
                                <select class="form-select" name="kelurahan" id="kelurahan" data-old="{{ old('kelurahan', $data->kelurahan) }}" disabled>
                                    <option value="0" selected disabled>Pilih Kelurahan</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label for="kodePos" class="form-label">Kode Pos</label>
                                <input type="text" class="form-control" name="kode_pos" id="kode_pos" placeholder="Masukkan Kode Pos.." value="{{ old('kode_pos', $data->kode_pos) }}" disabled>
                            </div>

                            <div class="col-12">
                                <label for="alamatLengkap" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat Lengkap.." readonly>{{ old('alamat', $data->alamat) }}</textarea>
                            </div>

                            <div class="col-12">
                                <label for="alamat_sebelumnya" class="form-label">Alamat Sebelumnya</label>
                                <textarea class="form-control" name="alamat_sebelumnya" id="alamat_sebelumnya" placeholder="Masukkan Alamat Sebelumnya.." readonly>{{ old('alamat', $data->alamat_sebelumnya) }}</textarea>
                            </div>

                            <div class="col-6">
                                <label for="rt" class="form-label">RT</label>
                                <input type="text" class="form-control" name="rt" id="rt" placeholder="Masukkan RT.." value="{{ old('rt', $data->rt) }}" readonly>
                            </div>

                            <div class="col-6">
                                <label for="rw" class="form-label">RW</label>
                                <input type="text" class="form-control" name="rw" id="rw" placeholder="Masukkan RW.." value="{{ old('rw', $data->rw) }}" readonly>
                            </div>

                            <div class="col-6">
                                <label for="pendidikan" class="form-label">Pendidikan</label>
                                <input type="text" class="form-control" name="pendidikan" id="pendidikan" placeholder="Masukkan Pendidikan.." value="{{ old('pendidikan', $data->pendidikan) }}" readonly>
                            </div>

                            <div class="col-6">
                                <label for="jenisPekerjaan" class="form-label">Jenis Pekerjaan</label>
                                <input type="text" class="form-control" name="jenis_pekerjaan" id="jenis_pekerjaan" placeholder="Masukkan Jenis Pekerjaan.." value="{{ old('jenis_pekerjaan', $data->jenis_pekerjaan) }}" readonly>
                            </div>

                            <div class="col-6">
                                <label for="statusPerkawinan" class="form-label">Status Perkawinan</label>
                                <select class="form-select" name="status_perkawinan" id="status_perkawinan" disabled>
                                    <option value="" selected disabled>Pilih Status Perkawinan</option>
                                    <option value="0" @if($data->status_perkawinan == 0) selected @endif>Belum Menikah</option>
                                    <option value="1" @if($data->status_perkawinan == 1) selected @endif>Kawin</option>
                                    <option value="2" @if($data->status_perkawinan == 2) selected @endif>Cerai Hidup</option>
                                    <option value="3" @if($data->status_perkawinan == 3) selected @endif>Cerai Mati</option>
                                </select>
                            </div>

                            <div class="col-6">
                                <label for="statusDalamKeluarga" class="form-label">Status Dalam Keluarga</label>
                                <select class="form-select" name="status_dalam_keluarga" id="status_dalam_keluarga" disabled>
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
                                <select class="form-select" name="kewarganegaraan" id="kewarganegaraan" disabled>
                                    <option value="WNI" @if($data->kewarganegaraan == 'WNI') selected @endif>Warga Negara Indonesia</option>
                                    <option value="WNA" @if($data->kewarganegaraan == 'WNA') selected @endif>Warga Negara Asing</option>
                                </select>
                            </div>

                            <div class="col-6">
                                <label for="namaAyah" class="form-label">Nama Ayah</label>
                                <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Masukkan Nama Ayah.." value="{{ old('nama_ayah', $data->nama_ayah) }}" disabled>
                            </div>

                            <div class="col-6">
                                <label for="pekerjaanAyah" class="form-label">Pekerjaan Ayah</label>
                                <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Masukkan Pekerjaan Ayah.." value="{{ old('pekerjaan_ayah', $data->pekerjaan_ayah) }}" disabled>
                            </div>

                            <div class="col-6">
                                <label for="namaIbu" class="form-label">Nama Ibu</label>
                                <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Masukkan Nama Ibu.." value="{{ old('nama_ibu', $data->nama_ibu) }}" disabled>
                            </div>

                            <div class="col-6">
                                <label for="pekerjaanIbu" class="form-label">Pekerjaan Ibu</label>
                                <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Masukkan Pekerjaan Ibu.." value="{{ old('pekerjaan_ibu', $data->pekerjaan_ibu) }}" disabled>
                            </div>

                            <div class="col-12">
                                <label for="bantuanPemerintah" class="form-label">Warga Pindahan</label></br>
                                <input type="radio" id="warga_pindahan" name="warga_pindahan" value="1" @if($data->warga_pindahan == 1) checked @endif disabled>
                                <label for="Ya">Ya</label>
                                <input type="radio" id="warga_pindahan" name="warga_pindahan" value="0" @if($data->warga_pindahan == 0) checked @endif disabled>
                                <label for="Tidak">Tidak</label><br>
                            </div>

                            <div class="col-12">
                                <label for="bantuanPemerintah" class="form-label">Bantuan Pemerintah</label></br>
                                <input type="radio" id="bantuan_pemerintah" name="bantuan_pemerintah" value="1" @if($data->bantuan_pemerintah == 1) checked @endif disabled>
                                <label for="Ya">Ya</label>
                                <input type="radio" id="bantuan_pemerintah" name="bantuan_pemerintah" value="0" @if($data->bantuan_pemerintah == 0) checked @endif disabled>
                                <label for="Tidak">Tidak</label><br>
                            </div>

                            <div class="col-12">
                                <label for="disabilitas" class="form-label">Disabilitas</label></br>
                                <input type="radio" id="disabilitas" name="disabilitas" value="1" @if($data->disabilitas == 1) checked @endif disabled>
                                <label for="Ya">Ya</label>
                                <input type="radio" id="disabilitas" name="disabilitas" value="0" @if($data->disabilitas == 0) checked @endif disabled>
                                <label for="Tidak">Tidak</label><br>
                            </div>

                            <div class="col-12">
                                <label for="verifikasi" class="form-label">Status Verikasi</label>
                                <select class="form-select" name="verification" id="verification">
                                    <option value="" selected disabled>Pilih Status Verifikasi</option>
                                    <option value="0" {{ old('verification', $data->verification) == '0' ? 'selected' : '' }}>Belum Verifikasi</option>
                                    <option value="1" {{ old('verification', $data->verification) == '1' ? 'selected' : ''  }}>Verifikasi</option>
                                </select>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ route('dashboard.index') }}" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="card">
                    <div class="card-body details-pendaftaran mt-4">
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
                                <div class="title">Foto KTP</div>
                                <div class="banner-image-wrapper">
                                    @if(!empty($data->foto_ktp))
                                        <div class="image" style="background-image: url({{ Storage::exists('public/' . $data->foto_ktp) && $data->foto_ktp ? Storage::url($data->foto_ktp) : '' }})"></div>
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
            const selectNameKabupaten = $('select[name="kabupaten"]');
            const selectNameKecamatan = $('select[name="kecamatan"]');
            const selectNameKelurahan = $('select[name="kelurahan"]');

            function populateSelect(url, selectElement, selectedValue, defaultOptionText) {
                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        selectElement.empty();
                        selectElement.append('<option value="0" selected disabled>' + defaultOptionText + '</option>');
                        $.each(data, function(key, value) {
                            const isSelected = selectedValue == key ? 'selected' : '';
                            selectElement.append('<option value="' + key + '" ' + isSelected + '>' + value + '</option>');
                        });
                    }
                });
            }

            const provinsiOld = $('#provinsi').data('old');
            const kabupatenOld = $('#kabupaten').data('old');
            const kecamatanOld = $('#kecamatan').data('old');
            const kelurahanOld = $('#kelurahan').data('old');

            if (provinsiOld) {
                $('select[name="provinsi"]').val(provinsiOld);
                populateSelect('/getKabupaten/' + provinsiOld, selectNameKabupaten, kabupatenOld, 'Pilih Kabupaten / Kota');
            }

            $('select[name="provinsi"]').on('change', function() {
                const ProvinceID = $(this).val();
                if (ProvinceID) {
                    populateSelect('/getKabupaten/' + ProvinceID, selectNameKabupaten, kabupatenOld, 'Pilih Kabupaten / Kota');
                } else {
                    selectNameKabupaten.empty();
                }
            });

            if (kabupatenOld) {
                populateSelect('/getKecamatan/' + kabupatenOld, selectNameKecamatan, kecamatanOld, 'Pilih Kecamatan');
            }

            $('select[name="kabupaten"]').on('change', function() {
                const CitiesID = $(this).val();
                if (CitiesID) {
                    populateSelect('/getKecamatan/' + CitiesID, selectNameKecamatan, kecamatanOld, 'Pilih Kecamatan');
                } else {
                    selectNameKecamatan.empty();
                }
            });

            if (kecamatanOld) {
                populateSelect('/getKelurahan/' + kecamatanOld, selectNameKelurahan, kelurahanOld, 'Pilih Kelurahan');
            }

            $('select[name="kecamatan"]').on('change', function() {
                const WardID = $(this).val();
                if (WardID) {
                    populateSelect('/getKelurahan/' + WardID, selectNameKelurahan, kelurahanOld, 'Pilih Kelurahan');
                } else {
                    selectNameKelurahan.empty();
                }
            });
        });
    </script>
@endpush
