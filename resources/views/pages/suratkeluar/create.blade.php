@extends('layouts.master')

@section('title', 'Input Surat Keluar')
@section('suratkeluar', 'active')

@section('page-title', 'Input Surat Keluar')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item active">Surat Keluar</li>
@endsection

@section('content')

    <a href="{{ route('surat-keluar.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mb-4">
        <i class="fas fa-angle-left fa-sm text-white-50"></i>
        Kembali
    </a>

    <!-- Alert -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="my-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <!-- Card Body -->
        <div class="card-body">
            <form action="{{ route('surat-keluar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <strong class="text-center d-block">Input Data Penerima</strong>
                <hr>
                <div class="from-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="namaPenerima" class="form-label">Nama Penerima Surat</label>
                            <input type="text" class="form-control" name="namaPenerima" id="namaPenerima" placeholder="" value="{{ old('namaPenerima') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="tglSuratDiterima" class="form-label">Tanggal Surat Diterima</label>
                            <input type="date" class="form-control" name="tglSuratDiterima" id="tglSuratDiterima" value="{{ old('tglSuratDiterima') }}">
                        </div>
                    </div>
                </div>
                <br>
                <hr>
                <strong class="text-center d-block">Input Data Surat</strong>
                <hr>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="kodesuratKeluar" class="form-label">Kode Surat Keluar</label>
                            <input type="text" class="form-control" id="kodesuratKeluar" name="kodesuratKeluar" placeholder="Masukkan Kode Surat Keluar" value="{{ $kodeSurat }}" required readonly>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="tglpembuatanSurat" class="form-label">Tanggal Pembuatan Surat</label>
                            <input type="date" class="form-control" name="tglpembuatanSurat" id="tglpembuatanSurat" value="{{ old('tglpembuatanSurat') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tglpengirimanSurat" class="form-label">Tanggal Pengiriman Surat</label>
                            <input type="date" class="form-control" name="tglpengirimanSurat" id="tglpengirimanSurat" value="{{ old('tglpengirimanSurat') }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">       
                        <div class="col-md-6">
                            <label for="tujuanSurat" class="form-label">Tujuan Surat</label>
                            <input type="text" class="form-control" name="tujuanSurat" id="tujuanSurat" placeholder="" value="{{ old('tujuanSurat') }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="perihal" class="form-label">Perihal</label>
                            <input type="text" class="form-control" name="perihal" id="perihal" value="{{ old('perihal') }}" placeholder="" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="pembuat" class="form-label">Pembuat Surat</label>
                            <input type="text" class="form-control" name="pembuat" id="pembuat" placeholder="" value="{{ old('pembuat') }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="fileSurat" class="form-label">File Surat</label>
                            <input type="file" class="form-control" name="fileSurat" id="fileSurat" required>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-primary col-12 mx-auto"><i class="fas fa-plus"></i> Tambah Surat Keluar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection