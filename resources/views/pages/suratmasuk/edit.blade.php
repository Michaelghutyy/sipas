@extends('layouts.master')

@section('title', 'Edit Surat Masuk')
@section('suratmasuk', 'active')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Surat Masuk</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Surat Masuk</li>
    </ol>
    
    <a href="{{ route('surat-masuk.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mb-4">
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
            <form action="{{ route('surat-masuk.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="kodesuratMasuk" class="form-label">Kode Surat Masuk</label>
                            <input type="text" class="form-control" id="kodesuratMasuk" name="kodesuratMasuk" placeholder="Kode Surat Masuk" value="{{ old('kodesuratMasuk', $data->kodesuratMasuk) }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="nosuratMasuk" class="form-label">No Surat Masuk</label>
                            <input type="text" class="form-control" id="nosuratMasuk" name="nosuratMasuk" placeholder="No Surat Masuk" value="{{ old('nosuratMasuk', $data->nosuratMasuk) }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="tglSurat" class="form-label">Tanggal Surat</label>
                            <input type="date" class="form-control" name="tglSurat" id="tglSurat" value="{{ old('tglSurat', $data->tglSurat) }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="tglsuratMasuk" class="form-label">Tanggal Surat Masuk</label>
                            <input type="date" class="form-control" name="tglsuratMasuk" id="tglsuratMasuk" value="{{ old('tglsuratMasuk', $data->tglsuratMasuk) }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">       
                        <div class="col-md-6">
                            <label for="asalSurat" class="form-label">Asal Surat</label>
                            <input type="text" class="form-control" name="asalSurat" id="asalSurat" placeholder="Masukkan Asal Surat" value="{{ old('asalSurat', $data->asalSurat) }}" required>
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
                            <label for="disposisi" class="form-label">Disposisi</label>
                            <select class="form-control" name="disposisi_id" id="disposisi_id" required>
                                <option value="" selected disabled>Pilih Disposisi</option>
                                @foreach ($disposisi as $d)
                                    <option value="{{ $d->id }}" {{ ($d->id == $data->disposisi_id) ? 'selected' : '' }}>{{ $d->tujuan }} : {{ $d->batasWaktu }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="fileSurat" class="form-label">File Surat</label>
                            <input type="file" class="form-control" name="fileSurat" id="fileSurat">
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-primary col-12 mx-auto"><i class="fas fa-pencil"></i> Edit Surat Masuk</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection