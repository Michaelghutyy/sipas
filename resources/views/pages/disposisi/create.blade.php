@extends('layouts.master')

@section('title', 'Input Disposisi')

@section('page-title', 'Input Disposisi')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="{{ route('surat-masuk.index') }}">Surat Masuk</a></li>
    <li class="breadcrumb-item active">Disposisi</li>
@endsection

@section('content')    
    <a href="{{ route('disposisi.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm mb-4">
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
            <form action="{{ route('disposisi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="tujuan" class="form-label">Tujuan Surat</label>
                            <input type="text" class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan Surat" value="{{ old('tujuan  ') }}" required>
                        </div>
                        <div class="col-md-6">
                            <label for="batasWaktu" class="form-label">Batas Waktu</label>
                            <input type="date" class="form-control" id="batasWaktu" name="batasWaktu" value="{{ old('batasWaktu') }}" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="isiRingkasan" class="form-label">Isi Ringkasan</label>
                            <textarea class="form-control" id="isiRingkasan" name="isiRingkasan" rows="3" placeholder="Isi Ringkasan" required>{{ old('isiRingkasan') }}</textarea>
                            
                        </div>
                        <div class="col-md-6">
                            <label for="sifat" class="form-label">Sifat Surat</label>
                            <input type="text" class="form-control" name="sifat" id="sifat" value="{{ old('sifat') }}" placeholder="Sifat Surat" required>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">       
                        <div class="col-md-12">
                            <label for="catatan" class="form-label">Catatan</label>
                            <textarea class="form-control" id="catatan" name="catatan" rows="3" placeholder="Catatan" required>{{ old('catatan') }}</textarea>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="row">
                        <div class="col-md-12 mt-3">
                            <button type="submit" class="btn btn-primary col-12 mx-auto"><i class="fas fa-plus"></i> Tambah Disposisi</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection