@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12" >			
        <form  class="form-horizontal templatemo-contact-form-1" role="form" action="{{ route('login') }}" method="post">
            @csrf
            <div class="row" >
                <div class="col-md-12">                   
                    <div class="text-center" style="font-weight: bold; color: white;">
                       <img src="{{ asset('images/10.png') }}" alt="">
                        <h3>Sistem Informasi</h3>
                        <h4>Pengarsipan Dokumen Surat dan Disposisi Surat </h4>
                        <h4>PT. Centrotec JIT Bintan</h4>
                    </div>
                </div>
            </div>
            <br>
            <div class="row justify-content-center" style="color: white">
                <div class="templatemo-two-signin col-md-10">
                    <div class="form-group">
                      <div class="col-md-12">		          	
                        <label for="email" class="control-label">Email Address</label>
                        <div class="templatemo-input-icon-container">
                            <i class="fa fa-user"></i>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>		            		            		            
                      </div>              
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <label for="password" class="control-label">Password</label>
                        <div class="templatemo-input-icon-container">
                            <i class="fa fa-lock"></i>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <div class="checkbox">
                           
                            <label class="form-check-label" for="remember">
                                 <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="col-md-12">
                        <input type="submit" value="LOG IN" class="btn btn-warning">
                      </div>
                    </div>
                    <div class="form-group">
                          <div class="col-md-12">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                            </div>
                    </div>
                </div>
            </div>				 	
        </form>		      		      
    </div>
</div>
@endsection
