@extends('admin.layouts.master')

@section('title', 'Admin | Halaman Data Warga')

@section('content')
<div class="pagetitle">
    <h1>Pengelolaan Pengaduan Suara</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
        <li class="breadcrumb-item">Table</li>
        <li class="breadcrumb-item active">Pengaduan Suara</li>
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
                    <div class="col-12 col-md-10">
                        <div class="row mt-4">
                            <div class="col-12 col-md-6">
                                <div class="title">Nama Lengkap</div>
                                <div class="subtitle">{{ $data->name }}</div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="title">Judul</div>
                                <div class="subtitle">{{ $data->title }}</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="title">Pesan</div>
                                <div class="subtitle">{{ $data->message }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection