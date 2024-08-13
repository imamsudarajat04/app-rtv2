@extends('admin.layouts.master')

@section('title', 'Admin | Halaman Data Kematian')

@section('content')
    <div class="pagetitle">
        <h1>Pengelolaan Data Kematian</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
                <li class="breadcrumb-item">Table</li>
                <li class="breadcrumb-item active">Data Kematian</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <!-- Alert -->
                @if($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ $message }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="delete-response">

                </div>

                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('DataKematian.create') }}" class="btn btn-primary float-right" style="margin-top: 15px;">Tambah Data Kematian</a>
                        <h5 class="card-title">Data Kematian</h5>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered dt-responsive nowrap w-100 display" id="tableDataKematian">
                                <thead>
                                <tr>
                                    <th width="70px">No</th>
                                    <th>No Akte Kematian</th>
                                    <th>No KTP</th>
                                    <th>Nama Warga</th>
                                    <th>Alamat Lengkap</th>
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
        </div>

    </section>
@endsection

@push('customjs')
    <script>
        const datatable = $('#tableDataKematian').DataTable({
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
                    data: 'no_akte_kematian',
                    name: 'no_akte_kematian'
                },
                {
                    data: 'no_ktp',
                    name: 'no_ktp'
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'address',
                    name: 'address',
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
                $(nRow).attr('id', 'dataKematian' + data.id);
            },
        });

        $(document).on("click", ".delete_data_kematian", function() {
            let id = $(this).data('id');
            let token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: "DataKematian/" + id,
                type: "DELETE",
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(data) {
                    $('#dataKematian' + id).remove();
                    $('#tableDataKematian').DataTable().ajax.reload();
                    $('#tableDataKematian').DataTable().draw();
                    $(".delete-response").append(
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil Menghapus Data Kematian<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>',
                    );
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });
    </script>
@endpush
