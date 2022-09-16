@extends('admin.layouts.master')

@section('title', 'Admin | Halaman Data Warga')

@section('content')
<div class="pagetitle">
    <h1>Pengelolaan Data Warga Pindahan</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
        <li class="breadcrumb-item">Table</li>
        <li class="breadcrumb-item active">Data Warga Pindahan</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
              <h5 class="card-title">Data Warga Pindahan</h5>
                <table class="table table-striped table-bordered dt-responsive nowrap w-100 display" id="tableWarga">
                    <thead>
                        <tr>
                            <th width="70px">No</th>
                            <th>NO KK</th>
                            <th>NIK</th>
                            <th>NAMA LENGKAP</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th width="150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
          </div>
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