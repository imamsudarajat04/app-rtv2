@extends('admin.layouts.master')

@section('title', 'Admin | Halaman Data Warga')

@section('content')
<div class="pagetitle">
    <h1>Pengelolaan Data Warga</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
        <li class="breadcrumb-item">Table</li>
        <li class="breadcrumb-item active">Data Warga</li>
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
              <div class="d-flex justify-content-between align-items-center mb-3 mt-4">
                  <a href="{{ route('DataWarga.create') }}" class="btn btn-primary">Tambah Warga</a>

                  <!-- Kanan: Filter dan Reset -->
                  <div class="d-flex align-items-center gap-2">
                      <!-- Filter RT -->
                      <select class="form-select" id="filterRT" style="width: 120px;">
                          <option selected disabled>Filter RT</option>
                          @for($i=1;$i<10;$i++)
                              <option value="0{{$i}}">RT 0{{$i}}</option>
                          @endfor
                      </select>

                      <!-- Filter RW -->
                      <select class="form-select" id="filterRW" style="width: 120px;">
                          <option selected disabled>Filter RW</option>
                          @for($a=1;$a<10;$a++)
                              <option value="0{{$a}}">RW 0{{$a}}</option>
                          @endfor
                      </select>

                      <!-- Tombol Reset -->
                      <button class="btn btn-secondary" id="resetFilter">Reset</button>

                      <form method="GET" action="{{ route('DataWarga.export') }}" id="exportForm">
                          <input type="hidden" name="rt" id="exportRT">
                          <input type="hidden" name="rw" id="exportRW">
                          <button type="submit" class="btn btn-success">Export</button>
                      </form>
                  </div>
              </div>
              <h5 class="card-title">Data Warga</h5>
                <table class="table table-striped table-bordered dt-responsive nowrap w-100 display" id="tableWarga">
                    <thead>
                        <tr>
                            <th style="width: 70px;">No</th>
                            <th>NO KK</th>
                            <th>NIK</th>
                            <th>NAMA LENGKAP</th>
                            <th>RT</th>
                            <th>RW</th>
                            <th>Verifikasi</th>
                            <th style="width: 150px;">Action</th>
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
        $(document).ready(function () {
            const table = $('#tableWarga').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: '{!! url()->current() !!}',
                order: [[1, 'asc']],
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', width: '1%', orderable: false, searchable: false },
                    { data: 'no_kk', name: 'no_kk' },
                    { data: 'nik', name: 'nik' },
                    { data: 'nama_lengkap', name: 'nama_lengkap' },
                    { data: 'rt', name: 'rt' },
                    { data: 'rw', name: 'rw' },
                    { data: 'verification', name: 'verification', searchable: false },
                    { data: 'action', name: 'action', orderable: false, searchable: false, width: '1%' }
                ],
                sDom: '<"secondBar d-flex flex-wrap justify-content-between mb-2"lf>rt<"bottom"p>',
                fnCreatedRow: function(nRow, data) {
                    $(nRow).attr('id', 'warga' + data.id);
                },
            });

            // Filter RT dan RW
            $('#filterRT, #filterRW').on('change', function () {
                const rt = $('#filterRT').val();
                const rw = $('#filterRW').val();

                // Set Export
                $('#exportRT').val(rt);
                $('#exportRW').val(rw);

                table.column(4).search(rt ? '^' + rt + '$' : '', true, false); // Column 4 = RT
                table.column(5).search(rw ? '^' + rw + '$' : '', true, false); // Column 5 = RW
                table.draw();
            });

            // Reset Filter
            $('#resetFilter').on('click', function () {
                $('#filterRT, #filterRW').val('');
                $('#exportRT, #exportRW').val('');
                table.column(4).search('').column(5).search('').draw();
            });

            // Hapus data warga
            $(document).on("click", ".delete_warga", function() {
                const id = $(this).data('id');
                let token = $("meta[name='csrf-token']").attr("content");

                $.ajax({
                    url: "DataWarga/" + id,
                    type: "DELETE",
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function(data) {
                        $('#warga' + id).remove();
                        table.ajax.reload();
                        $(".delete-response").append(
                            '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil Menghapus Data Warga<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                        );
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    }
                });
            });
        });
    </script>
@endpush

