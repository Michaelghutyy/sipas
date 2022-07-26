@extends('layouts.master')

@section('title', 'Halaman Surat Masuk')
@section('suratmasuk', 'active')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Surat Masuk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Surat Masuk</li>
    </ol>

    <a href="{{ route('surat-masuk.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-4">
        <i class="fas fa-plus fa-sm text-white-50"></i>
        Tambah
    </a>

    <div class="card shadow mb-4">
        <!-- Card Body -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered dt-responsive nowrap w-100 display" id="tableTestimoni">
                    <thead>
                        <tr>
                            <th width="70px">No</th>
                            <th>Kode Surat Masuk</th>
                            <th>No Surat Masuk</th>
                            <th>Tanggal Surat Masuk</th>
                            <th>Asal Surat</th>
                            <th>Perihal</th>
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
    
@endpush