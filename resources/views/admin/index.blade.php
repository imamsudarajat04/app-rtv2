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
      <div class="col-lg-12">
        <div class="row">

            <div class="col-xxl-3 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Jumlah Data Akun</h5>
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
            </div>

            <div class="col-xxl-3 col-md-6">
                <div class="card info-card revenue-card">

                    <div class="card-body">
                        <h5 class="card-title">Jumlah Data RT</h5>

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
            </div>

            <div class="col-xxl-3 col-md-6">
                <div class="card info-card customers-card">

                    <div class="card-body">
                        <h5 class="card-title">Jumlah Data RW </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $rw }}</h6>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-3 col-md-6">
                <div class="card info-card revenue-card">

                    <div class="card-body">
                        <h5 class="card-title">Jumlah Data Pria </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fas fa-male"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $pria }}</h6>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Jumlah Data Semua Warga</h5>

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
            </div>

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card revenue-card">

                    <div class="card-body">
                        <h5 class="card-title">Jumlah Warga Pindahan </h5>

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
            </div>

            <div class="col-xxl-4 col-md-6">
                <div class="card info-card sales-card">

                    <div class="card-body">
                        <h5 class="card-title">Jumlah Data Perempuan </h5>

                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                <i class="fas fa-female"></i>
                            </div>
                            <div class="ps-3">
                                <h6>{{ $perempuan }}</h6>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-xxl-4 col-md-6">
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
            </div>

            <div class="col-xxl-4 col-md-6">
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
            </div>

        </div>
      </div>

    </div>

    <div class="row">
        <div class="card">
            <div class="card-body">

                <h5 class="card-title">Verifikasi Data Warga</h5>
                <table class="table table-striped table-bordered dt-responsive nowrap w-100 display" id="tableWarga">
                    <thead>
                    <tr>
                        <th style="width: 70px;">No</th>
                        <th>NO KK</th>
                        <th>NIK</th>
                        <th>NAMA LENGKAP</th>
                        <th>RT</th>
                        <th>RW</th>
                        <th style="width: 150px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection

@push('customjs')
    <script>
        var datatable = $('#tableWarga').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: '{!! url()->current() !!}',
            order: [
                [1, 'asc']
            ],
            columns: [{
                data: 'DT_RowIndex',
                name: 'DT_RowIndex',
                width: '1%',
                orderable: false,
                searchable: false
            },
                {
                    data: 'no_kk',
                    name: 'no_kk'
                },
                {
                    data: 'nik',
                    name: 'nik'
                },
                {
                    data: 'nama_lengkap',
                    name: 'nama_lengkap',
                },
                {
                    data: 'rt',
                    name: 'rt',
                },
                {
                    data: 'rw',
                    name: 'rw',
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false,
                    width: '1%'
                }
            ],
            sDom: '<"secondBar d-flex flex-w1rap justify-content-between mb-2"lf>rt<"bottom"p>',

            "fnCreatedRow": function(nRow, data) {
                $(nRow).attr('id', 'warga' + data.id);
            },
        });
    </script>
@endpush
