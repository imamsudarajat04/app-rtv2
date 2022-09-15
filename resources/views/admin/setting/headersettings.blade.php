@extends('admin.layouts.master')

@section('title', "Admin | Halaman Setting Header")

@section('content')
<div class="pagetitle">
    <h1>Pengaturan Header</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
        <li class="breadcrumb-item">Form</li>
        <li class="breadcrumb-item active">Edit Header</li>
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

            <!-- Alert -->
            @if($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                              
            <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Pengisian Data</h5>
    
                  <form class="row g-3" action="{{ route('header-setting.update', $headerSettings->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                      <div class="col-12">
                        <label for="Nama Aplikasi" class="form-label">Nama Aplikasi</label>
                        <input type="text" class="form-control" name="app_name" id="app_name" placeholder="Masukkan Nama Aplikasi.." value="{{ old('app_name', $headerSettings->app_name) }}" required>
                      </div>
                      <div class="col-6">
                          <label for="Title" class="form-label">Title</label>
                          <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan Title.." value="{{ old('title', $headerSettings->title) }}" required>
                      </div>
                      <div class="col-6">
                          <label for="Subtitle" class="form-label">Subtitle</label>
                          <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="Masukkan Subtitle.." value="{{ old('subtitle', $headerSettings->subtitle) }}" required>
                      </div>
                    <div class="text-center d-grid gap-2 mt-3">
                      <button type="submit" class="btn btn-primary">Update</button>
                      {{-- <a href="{{ route('DataAkun.index') }}" class="btn btn-danger">Kembali</a> --}}
                    </div>
                  </form>
    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection