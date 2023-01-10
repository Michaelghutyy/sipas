@extends('layouts.master')

@section('title', 'Edit Surat Keluar')
@section('suratkeluar', 'active')

@section('page-title', 'Edit Surat Keluar')

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
            <form action="{{ route('surat-keluar.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="kodesuratKeluar" class="form-label">Kode Surat Keluar</label>
                            <input type="text" class="form-control" id="kodesuratKeluar" name="kodesuratKeluar" placeholder="Masukkan Kode Surat Keluar" value="{{ old('kodesuratKeluar', $data->kodesuratKeluar) }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="nosuratKeluar" class="form-label">No Surat Keluar</label>
                            <input type="text" class="form-control" id="nosuratKeluar" name="nosuratKeluar" placeholder="Masukkan No Surat Keluar" value="{{ old('nosuratKeluar', $data->nosuratKeluar) }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="tglpembuatanSurat" class="form-label">Tanggal Pembuatan Surat</label>
                            <input type="date" class="form-control" name="tglpembuatanSurat" id="tglpembuatanSurat" value="{{ old('tglpembuatanSurat', $data->tglpembuatanSurat) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tglpengirimanSurat" class="form-label">Tanggal Pengiriman Surat</label>
                            <input type="date" class="form-control" name="tglpengirimanSurat" id="tglpengirimanSurat" value="{{ old('tglpengirimanSurat', $data->tglpengirimanSurat) }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">       
                        <div class="col-md-6">
                            <label for="tujuanSurat" class="form-label">Tujuan Surat</label>
                            <input type="text" class="form-control" name="tujuanSurat" id="tujuanSurat" placeholder="Masukkan Tujuan Surat" value="{{ old('tujuanSurat', $data->tujuanSurat) }}" required>
                        </div>

                        <div class="col-md-6">
                            <label for="perihal" class="form-label">Perihal</label>
                            <input type="text" class="form-control" name="perihal" id="perihal" value="{{ old('perihal', $data->perihal) }}" placeholder="Masukkan Perihal" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="pembuat" class="form-label">Pembuat Surat</label>
                            <input type="text" class="form-control" name="pembuat" id="pembuat" placeholder="Masukkan Pembuat Surat" value="{{ old('pembuat', $data->pembuat) }}" required>
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
                            <button type="submit" class="btn btn-primary col-12 mx-auto"><i class="fas fa-pencil"></i> Edit Surat Keluar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection