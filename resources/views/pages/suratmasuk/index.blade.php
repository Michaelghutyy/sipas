@extends('layouts.master')

@section('title', 'Halaman Surat Masuk')
@section('suratmasuk', 'active')

@section('page-title', 'Surat Masuk')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Surat Masuk</li>
@endsection

@section('content')
    <a href="{{ route('surat-masuk.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-4">
        <i class="fas fa-plus fa-sm text-white-50"></i>
        Tambah
    </a>

    <a href="{{ route('surat-masuk.laporan') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm mb-4">
        <i class="fas fa-file-pdf fa-sm text-white-50"></i>
        Export PDF
    </a>

    <!-- Alert -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
        </div>
    @endif

    <div class="delete-response">

    </div>

    <div class="card shadow mb-4">
        <!-- Card Body -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered dt-responsive nowrap w-100 display" id="tableSuratMasuk">
                    <thead>
                        <tr>
                            <th width="70px">No</th>
                            <th>Kode Surat Masuk</th>
                            <th>Nama Penerima</th>
                            <th>Tanggal Di terima</th>
                            <th>Tanggal Surat Masuk</th>
                            <th>Asal Surat</th>
                            <th>Perihal</th>
                            <th>Status</th>
                            <th width="150px">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Hapus!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Anda yakin ingin menghapus data Surat Masuk ini ?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger delete-suratmasuk" value="">
                    <strong>
                        Hapus
                    </strong>
                </button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('customjs')
<script>
    var datatable = $('#tableSuratMasuk').DataTable({
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
                data: 'kodesuratMasuk',
                name: 'kodesuratMasuk'
            },
            {
                data: 'namaPenerima',
                name: 'namaPenerima',
            },
            {
                data: 'tglSuratDiterima',
                name: 'tglSuratDiterima',
            },
            {
                data: 'tglsuratMasuk',
                name: 'tglsuratMasuk',
            },
            {
                data: 'asalSurat',
                name: 'asalSurat',
                orderable: false,
            },
            {
                data: 'perihal',
                name: 'perihal',
                orderable: false,
            },
            {
                data: 'status',
                name: 'status',
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
        sDom: '<"secondBar d-flex flex-wrap justify-content-between mb-2"lf>rt<"bottom"p>',

        "fnCreatedRow": function(nRow, data) {
            $(nRow).attr('id', 'surat-masuk' + data.id);
        },
    });

    $(document).on("click", ".delete_modal", function() {
        var id = $(this).data('id');
        $(".modal-footer .delete-suratmasuk").val(id);
    });

    jQuery(document).ready(function($) {
        ////----- DELETE a link and remove from the page -----////
        jQuery('.delete-suratmasuk').click(function() {
            var suratmasuk_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                url: 'surat-masuk/' + suratmasuk_id,
                success: function(data) {
                    $('#exampleModal').modal('hide');
                    $("#surat-masuk" + suratmasuk_id).remove();
                    $(".delete-response").append(
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Surat Masuk Berhasil Di Hapus<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                    )
                }
            });
        });
    });
</script>
@endpush