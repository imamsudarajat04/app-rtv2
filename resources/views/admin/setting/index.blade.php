@extends('admin.layouts.master')

@section('title', "Admin | Pengaturan Layouts")

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Pengaturan</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Body -->
                <div class="card-body">
                    <div class="row mb-4 mt-5 d-flex justify-content-between">
                        <div class="col-4">
                            <a href="#" class="btn btn-block btn-primary" data-toggle="tooltip" data-placement="bottom" title="Untuk Mengubah Beberapa Komponen Pada Halaman Utama">
                                Pengaturan Utama
                            </a>
                        </div>
                        <div class="col-4">
                            <a href="#" class="btn btn-block btn-primary" data-toggle="tooltip" data-placement="bottom" title="Untuk Mengubah Tampilan Atau Font">Pengaturan Global</a>
                        </div>
                        <div class="col-4">
                            <a href="#" class="btn btn-block btn-primary" data-toggle="tooltip" data-placement="bottom" title="Untuk Mengubah Footer">Pengaturan Footer</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('customjs')
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
@endpush