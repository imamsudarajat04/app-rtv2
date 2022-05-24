@extends('admin.layouts.master')

@section('title', "Admin | Halaman Setting Abouts")

@section('content')
<div class="pagetitle">
    <h1>Pengaturan About</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
        <li class="breadcrumb-item">Form</li>
        <li class="breadcrumb-item active">Edit About</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

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
                    
                  <h5 class="card-title">Pengisian Data</h5>
    
                  <form class="row g-3" action="{{ route('abouts-setting.update', $abouts->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                      <div class="col-12">
                        <label for="Title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Masukkan Title.." value="{{ old('title', $abouts->title) }}" required>
                      </div>
                      <div class="col-12">
                        <label for="Deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Masukkan Deskripsi.." required>{{ old('description', $abouts->description) }}</textarea>
                      </div>
                      <div class="col-12">
                          <label for="Icon Pertama" class="form-label">Icon Pertama</label>
                          <input class="form-control" type="text" name="icon_one" id="icon_one" placeholder="Masukkan Icon Pertama.." value="{{ old('icon_one', $abouts->icon_one) }}" required>
                      </div>
                      <div class="col-6">
                          <label for="Title Pertama" class="form-label">Title Pertama</label>
                          <input class="form-control" type="text" name="title_one" id="title_one" placeholder="Masukkan Title Pertama.." value="{{ old('title_one', $abouts->title_one) }}" required>
                      </div>
                      <div class="col-6">
                          <label for="Subtitle Pertama" class="form-label">Subtitle Pertama</label>
                          <input class="form-control" type="text" name="subtitle_one" id="subtitle_one" placeholder="Masukkan Subtitle Pertama.." value="{{ old('subtitle_one', $abouts->subtitle_one) }}" required>
                      </div>
                      <div class="col-12">
                          <label for="Icon Kedua" class="form-label">Icon Kedua</label>
                          <input class="form-control" type="text" name="icon_two" id="icon_two" placeholder="Masukkan Icon Kedua.." value="{{ old('icon_two', $abouts->icon_two) }}" required>
                      </div>
                      <div class="col-6">
                          <label for="Title Kedua" class="form-label">Title Kedua</label>
                          <input class="form-control" type="text" name="title_two" id="title_two" placeholder="Masukkan Title Kedua.." value="{{ old('title_two', $abouts->title_two) }}" required>
                      </div>
                      <div class="col-6">
                          <label for="Subtitle Kedua" class="form-label">Subtitle Kedua</label>
                          <input class="form-control" type="text" name="subtitle_two" id="subtitle_two" placeholder="Masukkan Subtitle Kedua.." value="{{ old('subtitle_two', $abouts->subtitle_two) }}" required>
                      </div>
                      <div class="col-12">
                          <label for="Icon Ketiga" class="form-label">Icon Ketiga</label>
                          <input class="form-control" type="text" name="icon_three" id="icon_three" placeholder="Masukkan Icon Ketiga.." value="{{ old('icon_three', $abouts->icon_three) }}" required>
                      </div>
                      <div class="col-6">
                          <label for="Title Ketiga" class="form-label">Title Ketiga</label>
                          <input class="form-control" type="text" name="title_three" id="title_three" placeholder="Masukkan Title Ketiga.." value="{{ old('title_three', $abouts->title_three) }}" required>
                      </div>
                      <div class="col-6">
                          <label for="Subtitle Ketiga" class="form-label">Subtitle Ketiga</label>
                          <input class="form-control" type="text" name="subtitle_three" id="subtitle_three" placeholder="Masukkan Subtitle Ketiga.." value="{{ old('subtitle_three', $abouts->subtitle_three) }}" required>
                      </div>
                      <div class="col-12">
                          <label for="Icon Keempat" class="form-label">Icon Keempat</label>
                          <input class="form-control" type="text" name="icon_four" id="icon_four" placeholder="Masukkan Icon Keempat.." value="{{ old('icon_four', $abouts->icon_four) }}" required>
                      </div>
                      <div class="col-6">
                          <label for="Title Keempat" class="form-label">Title Keempat</label>
                          <input class="form-control" type="text" name="title_four" id="title_four" placeholder="Masukkan Title Keempat.." value="{{ old('title_four', $abouts->title_four) }}" required>
                      </div>
                      <div class="col-6">
                          <label for="Subtitle Keempat" class="form-label">Subtitle Keempat</label>
                          <input class="form-control" type="text" name="subtitle_four" id="subtitle_four" placeholder="Masukkan Subtitle Keempat.." value="{{ old('subtitle_four', $abouts->subtitle_four) }}" required>
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