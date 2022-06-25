@extends('admin.layouts.master')

@section('title', 'Admin | Halaman Pengaduan Suara')

@section('content')
<div class="pagetitle">
    <h1>Pengelolaan Pengaduan Suara</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
        <li class="breadcrumb-item">Table</li>
        <li class="breadcrumb-item active">Pengaduan Suara</li>
      </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section">
    <div class="row">
      <div class="col-lg-12">

        <!-- Alert -->
        @if($message = Session::get('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="delete-response">

        </div>

        <div class="card">
          <div class="card-body">
              <h5 class="card-title">Data Pengaduan Suara</h5>
                <table class="table table-striped table-bordered dt-responsive nowrap w-100 display" id="tablePengaduan">
                    <thead>
                        <tr>
                            <th width="70px">No</th>
                            <th>Nama Lengkap</th>
                            <th>Judul</th>
                            <th>Pesan</th>
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
        var datatable = $('#tablePengaduan').DataTable({
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
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'title',
                    name: 'title',
                },
                {
                    data: 'message',
                    name: 'message',
                    orderable: false,
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
                $(nRow).attr('id', 'penggaduan' + data.id);
            },
        });

        $(document).on("click", ".delete_akun", function() {
            var id = $(this).data('id');
            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: "pengaduan-suara-admin/" + id,
                type: "DELETE",
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(data) {
                    $('#penggaduan' + id).remove();
                    $('#tablePengaduan').DataTable().ajax.reload();
                    $('#tablePengaduan').DataTable().draw();
                    $(".delete-response").append(
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil Menghapus Data Akun<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>',
                    );
                },
                error: function(data) {
                    console.log('Error:', data);
                }
            });
        });
    </script>
@endpush