@extends('layouts.master')

@section('title', 'Halaman Surat Keluar')
@section('suratkeluar', 'active')

@section('page-title', 'Surat Keluar')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Surat Keluar</li>
@endsection

@section('content')
    <a href="{{ route('surat-keluar.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-4">
        <i class="fas fa-plus fa-sm text-white-50"></i>
        Tambah
    </a>

    <a href="{{ route('surat-keluar.laporan') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm mb-4">
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
                <table class="table table-striped table-bordered dt-responsive nowrap w-100 display" id="tableSuratKeluar">
                    <thead>
                        <tr>
                            <th width="70px">No</th>
                            <th>Kode Surat Keluar</th>
                            <th>No Surat Keluar</th>
                            <th>Tanggal Pembuatan Surat</th>
                            <th>Tanggal Pengiriman Surat</th>
                            <th>Tujuan Surat</th>
                            <th>Perihal</th>
                            <th>Pembuat Surat</th>
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
                <p>Anda yakin ingin menghapus data Surat Keluar ini ?</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger delete-suratkeluar" value="">
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
    var datatable = $('#tableSuratKeluar').DataTable({
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
                data: 'kodesuratKeluar',
                name: 'kodesuratKeluar'
            },
            {
                data: 'nosuratKeluar',
                name: 'nosuratKeluar',
            },
            {
                data: 'tglpembuatanSurat',
                name: 'tglpembuatanSurat',
            },
            {
                data: 'tglpengirimanSurat',
                name: 'tglpengirimanSurat',
            },
            {
                data: 'tujuanSurat',
                name: 'tujuanSurat',
                orderable: false,
            },
            {
                data: 'perihal',
                name: 'perihal',
                orderable: false,
            },
            {
                data: 'pembuat',
                name: 'pembuat',
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
            $(nRow).attr('id', 'surat-keluar' + data.id);
        },
    });

    $(document).on("click", ".delete_modal", function() {
        var id = $(this).data('id');
        $(".modal-footer .delete-suratkeluar").val(id);
    });

    jQuery(document).ready(function($) {
        ////----- DELETE a link and remove from the page -----////
        jQuery('.delete-suratkeluar').click(function() {
            var suratkeluar_id = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: "DELETE",
                url: 'surat-keluar/' + suratkeluar_id,
                success: function(data) {
                    $('#exampleModal').modal('hide');
                    $("#surat-keluar" + suratkeluar_id).remove();
                    $(".delete-response").append(
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Surat Keluar Berhasil Di Hapus<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>'
                    )
                }
            });
        });
    });
</script>
@endpush