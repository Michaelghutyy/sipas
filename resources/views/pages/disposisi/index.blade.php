@extends('layouts.master')

@section('title', 'Halaman Disposisi')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Disposisi</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('surat-masuk.index') }}">Surat Masuk</a></li>
        <li class="breadcrumb-item active">Disposisi</li>
    </ol>

    <a href="{{ route('disposisi.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-4">
        <i class="fas fa-plus fa-sm text-white-50"></i>
        Tambah
    </a>

    <!-- Alert -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <!-- Card Body -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered dt-responsive nowrap w-100 display" id="tableDisposisi">
                    <thead>
                        <tr>
                            <th width="70px">No</th>
                            <th>Tujuan</th>
                            <th>Batas Waktu</th>
                            <th>Sifat</th>
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
@endsection

@push('customjs')
<script>
    var datatable = $('#tableDisposisi').DataTable({
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
                data: 'tujuan',
                name: 'tujuan',
                orderable: false,
                searchable: false,
            },
            {
                data: 'batasWaktu',
                name: 'batasWaktu',
            },
            {
                data: 'sifat',
                name: 'sifat',
                orderable: false,
                searchable: false,
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false,
                width: '1%'
            }
        ],
        sDom: '<"secondBar d-flex flex-wrap justify-content-between mb-2"lf>rt<"bottom"p>',

        "fnCreatedRow": function(nRow, data) {
            $(nRow).attr('id', 'disposisi' + data.id);
        },
    });

    $(document).on("click", ".delete_modal", function() {
        var id = $(this).data('id');
        $(".modal-footer .delete-testimoni").val(id);
    });

    // jQuery(document).ready(function($) {
    //     ////----- DELETE a link and remove from the page -----////
    //     jQuery('.delete-testimoni').click(function() {
    //         var testimoni_id = $(this).val();
    //         $.ajaxSetup({
    //             headers: {
    //                 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    //             }
    //         });
    //         $.ajax({
    //             type: "DELETE",
    //             url: 'testimoni/' + testimoni_id,
    //             success: function(data) {
    //                 $('#exampleModal').modal('hide');
    //                 $("#testimoni" + testimoni_id).remove();
    //                 $(".delete-response").append(
    //                     '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Testimoni Berhasil Di Hapus<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"> &times; </span></button></div>'
    //                 )
    //             }
    //         });
    //     });
    // });
</script>
@endpush