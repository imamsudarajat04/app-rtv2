@extends('admin.layouts.master')

@section('title', "Admin | Halaman Edit Data Kematian")

@section('content')
    <div class="pagetitle">
        <h1>Formulir Edit Data Kematian</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                <li class="breadcrumb-item">Form</li>
                <li class="breadcrumb-item active">Data Kematian</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <!-- Alert Validasi-->
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
                        <h5 class="card-title">Pengisian Data Kematian</h5>

                        <form class="row g-3" action="{{ route('DataKematian.update', $deathData->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="col-4">
                                <label for="No Akte Kematian" class="form-label">No Akte Kematian</label>
                                <input type="text" class="form-control" name="no_akte_kematian" id="no_akte_kematian" placeholder="Masukkan No Akte Kematian.." value="{{ old('no_akte_kematian', $deathData->no_akte_kematian) }}" required>
                            </div>
                            <div class="col-4">
                                <label for="No KTP" class="form-label">No KTP</label>
                                <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="Masukkan No KTP.." value="{{ old('no_ktp', $deathData->no_ktp) }}" required>
                            </div>
                            <div class="col-4">
                                <label for="Nama Lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Lengkap.." value="{{ old('name', $deathData->name) }}" required>
                            </div>
                            <div class="col-12">
                                <label for="address" class="form-label">Alamat Lengkap</label>
                                <textarea class="form-control" name="address" id="address" style="height: 90px" placeholder="Masukkan Alamat Lengkap..">{{ old('address', $deathData->address) }}</textarea>
                            </div>
                            <div class="text-center d-grid gap-2 mt-3">
                                <button type="submit" class="btn btn-primary">Edit</button>
                                {{-- <a href="{{ route('DataAkun.index') }}" class="btn btn-danger">Kembali</a> --}}
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
