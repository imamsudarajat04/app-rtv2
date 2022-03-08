@extends('admin.layouts.master')

@section('title', 'Admin | Halaman Data Akun')

@section('content')
<div class="pagetitle">
    <h1>Pengelolaan Data Akun</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
        <li class="breadcrumb-item">Table</li>
        <li class="breadcrumb-item active">Data Akun</li>
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
              <a href="{{ route('DataAkun.create') }}" class="btn btn-primary float-right" style="margin-top: 15px;">Tambah Akun</a>
              <h5 class="card-title">Data Akun</h5>
                <table class="table table-striped table-bordered dt-responsive nowrap w-100 display" id="tableUser">
                    <thead>
                        <tr>
                            <th width="70px">No</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Role</th>
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
        var datatable = $('#tableUser').DataTable({
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
                    data: 'username',
                    name: 'username',
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
                    data: 'role',
                    name: 'role',
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
                $(nRow).attr('id', 'user' + data.id);
            },
        });

        $(document).on("click", ".delete_akun", function() {
            var id = $(this).data('id');
            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: "DataAkun/" + id,
                type: "DELETE",
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function(data) {
                    $('#user' + id).remove();
                    $('#tableUser').DataTable().ajax.reload();
                    $('#tableUser').DataTable().draw();
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