@extends('admin.layouts.master')

@section('title', "Admin | Halaman Setting Footer")

@section('content')
<div class="pagetitle">
    <h1>Pengaturan Footer</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
        <li class="breadcrumb-item">Form</li>
        <li class="breadcrumb-item active">Edit Footer</li>
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
    
                  <form class="row g-3" action="{{ route('footer-setting.update', $footerSettings->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                      <div class="col-12">
                        <label for="Alamat Footer" class="form-label">Alamat Footer</label>
                        <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat Footer.." value="{{ old('alamat', $footerSettings->alamat) }}" required>
                      </div>
                      <div class="col-6">
                          <label for="Telepon Footer 1" class="form-label">Telepon Footer 1</label>
                          <input type="text" class="form-control" name="telepon1" id="telepon1" placeholder="Masukkan Nomor Telepon 1.." value="{{ old('telepon1', $footerSettings->telepon1) }}" required>
                      </div>
                      <div class="col-6">
                          <label for="Telepon Footer 2" class="form-label">Telepon Footer 2</label>
                          <input type="text" class="form-control" name="telepon2" id="telepon2" placeholder="Masukkan Nomor Telepon 2.." value="{{ old('telepon2', $footerSettings->telepon2) }}" required>
                      </div>
                      <div class="col-12">
                          <label for="Email Footer" class="form-label">Email Footer</label>
                          <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email Footer.." value="{{ old('email', $footerSettings->email) }}" required>
                      </div>
                      <div class="col-12">
                        <label for="Link Twitter Footer" class="form-label">Link Twitter Footer</label>
                        <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Masukkan Link Twitter Footer.." value="{{ old('twitter', $footerSettings->twitter) }}" required>
                      </div>
                      <div class="col-12">
                        <label for="Link Facebook Footer" class="form-label">Link Facebook Footer</label>
                        <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Masukkan Link Facebook Footer.." value="{{ old('facebook', $footerSettings->facebook) }}" required>
                      </div>
                      <div class="col-12">
                        <label for="Link Instagram Footer" class="form-label">Link Instagram Footer</label>
                        <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Masukkan Link Instagram Footer.." value="{{ old('instagram', $footerSettings->instagram) }}" required>
                      </div>
                      <div class="col-12">
                        <label for="Link WhatsApp Footer" class="form-label">Link WhatsApp Footer</label>
                        <input type="text" class="form-control" name="whatsapp" id="whatsapp" placeholder="Masukkan Link WhatsApp Footer.." value="{{ old('whatsapp', $footerSettings->whatsapp) }}" required>
                      </div>
                      <div class="col-12">
                        <label for="Copyright Footer" class="form-label">Copyright Footer</label>
                        <input type="text" class="form-control" name="copyright" id="copyright" placeholder="Masukkan Copyright Footer.." value="{{ old('copyright', $footerSettings->copyright) }}" required>
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