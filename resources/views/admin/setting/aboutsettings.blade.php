@extends('admin.layouts.master')

@section('title', "Admin | Halaman Setting VISI & MISI")

@section('content')
<div class="pagetitle">
    <h1>Pengaturan VISI & MISI</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
        <li class="breadcrumb-item">Form</li>
        <li class="breadcrumb-item active">Edit VISI & MISI</li>
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
    
                  <form class="row g-3" action="{{ route('abouts-setting.update', $abouts->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                      <div class="col-12">
                        <label for="Title" class="form-label">Visi</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan Title.." value="{{ old('title', $abouts->title) }}" required>
                      </div>
                      <div class="col-12">
                        <label for="Deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Masukkan Deskripsi.." required>{{ old('description', $abouts->description) }}</textarea>
                      </div>
                      <div class="col-12">
                          <label for="Title Pertama" class="form-label">Title Misi Pertama</label>
                          <input class="form-control" type="text" name="title_one" id="title_one" placeholder="Masukkan Title Pertama.." value="{{ old('title_one', $abouts->title_one) }}" required>
                      </div>
                      <div class="col-12">
                          <label for="Subtitle Pertama" class="form-label">Subtitle Misi Pertama</label>
                          <textarea class="form-control" name="subtitle_one" id="subtitle_one" rows="3" placeholder="Masukkan Subtitle Misi Pertama.." required>{{ old('subtitle_one', $abouts->subtitle_one) }}</textarea>
                      </div>
                      <div class="col-12">
                          <label for="Title Kedua" class="form-label">Title Misi Kedua</label>
                          <input class="form-control" type="text" name="title_two" id="title_two" placeholder="Masukkan Title Kedua.." value="{{ old('title_two', $abouts->title_two) }}" required>
                      </div>
                      <div class="col-12">
                          <label for="Subtitle Kedua" class="form-label">Subtitle Misi Kedua</label>
                          <textarea class="form-control" name="subtitle_two" id="subtitle_two" rows="3" placeholder="Masukkan Subtitle Misi Kedua.." required>{{ old('subtitle_two', $abouts->subtitle_two) }}</textarea>
                      </div>
                      <div class="col-12">
                          <label for="Title Ketiga" class="form-label">Title Misi Ketiga</label>
                          <input class="form-control" type="text" name="title_three" id="title_three" placeholder="Masukkan Title Ketiga.." value="{{ old('title_three', $abouts->title_three) }}" required>
                        </div>
                        <div class="col-12">
                            <label for="Subtitle Ketiga" class="form-label">Subtitle Misi Ketiga</label>
                            <textarea class="form-control" name="subtitle_three" id="subtitle_three" rows="3" placeholder="Masukkan Subtitle Misi Ketiga.." required>{{ old('subtitle_three', $abouts->subtitle_three) }}</textarea>
                      </div>
                      <div class="col-12">
                          <label for="Title Keempat" class="form-label">Title Misi Keempat</label>
                          <input class="form-control" type="text" name="title_four" id="title_four" placeholder="Masukkan Title Keempat.." value="{{ old('title_four', $abouts->title_four) }}" required>
                      </div>
                      <div class="col-12">
                          <label for="Subtitle Keempat" class="form-label">Subtitle Misi Keempat</label>
                          <textarea class="form-control" name="subtitle_four" id="subtitle_four" rows="3" placeholder="Masukkan Subtitle Misi Keempat.." required>{{ old('subtitle_four', $abouts->subtitle_four) }}</textarea>
                      </div>
                      <div class="col-12">
                          <label for="Title Kelima" class="form-label">Title Misi Kelima</label>
                          <input class="form-control" type="text" name="title_five" id="title_fiva" placeholder="Masukkan Title Kelima.." value="{{ old('title_five', $abouts->title_five) }}" required>
                      </div>
                      <div class="col-12">
                          <label for="Subtitle Kelima" class="form-label">Subtitle Misi Kelima</label>
                          <textarea class="form-control" name="subtitle_five" id="subtitle_five" rows="3" placeholder="Masukkan Subtitle Misi Kelima.." required>{{ old('subtitle_five', $abouts->subtitle_five) }}</textarea>
                      </div>
                    <div class="text-center d-grid gap-2 mt-3">
                      <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                  </form>
    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection