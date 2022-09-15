@extends('admin.layouts.master')

@section('title', "Admin | Halaman Faq")

@section('content')
<div class="pagetitle">
    <h1>Formulir Faq</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
        <li class="breadcrumb-item">Form</li>
        <li class="breadcrumb-item active">Faq</li>
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
                  <h5 class="card-title">Pengisian Faq</h5>
    
                  <form class="row g-3" action="{{ route('Faq.store') }}" method="POST">
                    @csrf
                      <div class="col-6">
                          <label for="Pertanyaan" class="form-label">Pertanyaan</label>
                          <input type="text" class="form-control" name="question" id="question" placeholder="Masukkan Pertanyaan.." value="{{ old('question') }}" required>
                      </div>
                      <div class="col-6">
                          <label for="Jawaban" class="form-label">Jawaban</label>
                          <input type="text" class="form-control" name="answer" id="answer" placeholder="Masukkan Jawaban.." value="{{ old('answer') }}" required>
                      </div>
                    <div class="text-center d-grid gap-2 mt-3">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      {{-- <a href="{{ route('DataAkun.index') }}" class="btn btn-danger">Kembali</a> --}}
                    </div>
                  </form>
    
                </div>
            </div>
        </div>
    </div>
</section>
@endsection