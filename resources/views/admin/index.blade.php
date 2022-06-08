@extends('admin.layouts.master')

@section('content')
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

      <!-- Left side columns -->
      <div class="col-lg-8">
        <div class="row">

        @if (Auth::user()->role == 'superadmin')
          <!-- Data Akun Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Data Akun </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $user }}</h6>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Data Akun Card -->

          <!-- Data RT Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Data RT </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-badge-fill"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $rt }}</h6>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Data RT Card -->

          <!-- Data Warga Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Data Warga </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-lines-fill"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $warga }}</h6>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Data Warga Card -->

          <!-- Data Warga Pindahan Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Data Warga Pindahan </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-house-door"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $warga_pindahan }}</h6>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Data Warga Pindahan Card -->
        @endif

        @if (Auth::user()->role == 'rt')

          <!-- Data Warga Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card sales-card">

              <div class="card-body">
                <h5 class="card-title">Data Warga </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-lines-fill"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $warga }}</h6>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Data Warga Card -->

          <!-- Data Warga Pindahan Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Data Warga Pindahan </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-house-door"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $warga_pindahan_rt }}</h6>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Data Warga Pindahan Card -->

          <!-- Data Jumlah Kategori Balita Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Jumlah Kategori Balita </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fas fa-baby"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $balita_rt }}</h6>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Jumlah Kategori Balitaa Card -->

          <!-- Data Jumlah Kategori Lansia Card -->
          <div class="col-xxl-4 col-md-6">
            <div class="card info-card revenue-card">

              <div class="card-body">
                <h5 class="card-title">Jumlah Kategori Lansia </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fas fa-male"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $lansia_rt }}</h6>

                  </div>
                </div>
              </div>

            </div>
          </div><!-- End Jumlah Kategori Lansia Card -->
        @endif
        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->
      <div class="col-lg-4">
        @if (Auth::user()->role == 'superadmin')
            <!-- Kategori Balita -->
            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Jumlah Kategori Balita </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fas fa-baby"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $balita }}</h6>

                  </div>
                </div>
              </div>

            </div>
            <!-- End Kategori Balita -->

            <!-- Kategori Balita -->
            <div class="card info-card customers-card">

              <div class="card-body">
                <h5 class="card-title">Jumlah Kategori Lansia </h5>

                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="fas fa-male"></i>
                  </div>
                  <div class="ps-3">
                    <h6>{{ $lansia }}</h6>

                  </div>
                </div>
              </div>

            </div>
            <!-- End Kategori Balita -->
        @endif
        
      </div><!-- End Right side columns -->

    </div>
</section>
@endsection