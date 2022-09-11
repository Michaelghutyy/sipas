<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title', 'Dashboard')</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="{{ asset('vendor/DataTables/datatables.min.css') }}" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        @include('layouts.navbar')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('layouts.sidebar') 
            </div>
            <div id="layoutSidenav_content">
                <main>
                    @yield('content')
                </main>
                @include('layouts.footer')
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Ganti Password</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('ChangePassword.update', Auth::user()->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Password Lama</label>
                                    <div class="col-md-8 col-lg-9">
                                      <input name="old_password" type="password" class="form-control" id="old_password" value="{{ old('old_password') }}">
                                      @error('old_password')
                                          <small class="text-danger">{{ $message }}</small>
                                      @enderror
                                    </div>
                                  </div>
                
                                  <div class="row mb-3">
                                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Password Baru</label>
                                    <div class="col-md-8 col-lg-9">
                                      <input name="password" type="password" class="form-control" id="newPassword">
                                      @error('password')
                                          <small class="text-danger">{{ $message }}</small>
                                      @enderror
                                    </div>
                                  </div>
                
                                  <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Konfirmasi Password</label>
                                    <div class="col-md-8 col-lg-9">
                                      <input name="confirm_password" type="password" class="form-control" id="renewPassword">
                                      @error('confirm_password')
                                          <small class="text-danger">{{ $message }}</small>
                                      @enderror
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/DataTables/datatables.min.js') }}"></script>
        @stack('customjs')
    </body>
</html>
