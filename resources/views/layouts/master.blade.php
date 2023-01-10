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

        <!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="../assets/images/brand/favicon.ico" />

        <!-- BOOTSTRAP CSS -->
		<link id="style" href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet"/>
		<link href="{{ asset('/assets/css/skin-modes.css') }}" rel="stylesheet" />

		<!--- FONT-ICONS CSS -->
		<link href="{{ asset('/assets/css/icons.css') }}" rel="stylesheet"/>

		<!-- INTERNAL Switcher css -->
		<link href="{{ asset('/assets/switcher/css/switcher.css') }}" rel="stylesheet" />
		<link href="{{ asset('/assets/switcher/demo.css') }}" rel="stylesheet" />

    </head>
    <body class="ltr app sidebar-mini light-mode">

		<!-- Switcher -->
		<div class="switcher-wrapper">
			<div class="demo_changer">
				<div class="form_holder sidebar-right1">
					<div class="row">
						<div class="predefined_styles">
							<div class="swichermainleft">
								<h4>Navigation Style</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">Vertical Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch15"
													id="myonoffswitch34" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch34" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Horizontal Click Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch15"
													id="myonoffswitch35" class="onoffswitch2-checkbox">
												<label for="myonoffswitch35" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Horizontal Hover Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch15"
													id="myonoffswitch111" class="onoffswitch2-checkbox">
												<label for="myonoffswitch111" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>LTR and RTL VERSIONS</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">LTR Version</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch7"
													id="myonoffswitch23" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch23" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">RTL Version</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch7"
													id="myonoffswitch24" class="onoffswitch2-checkbox">
												<label for="myonoffswitch24" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Light Theme Style</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">Light Theme</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch1"
													id="myonoffswitch1" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch1" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex">
											<span class="me-auto">Light Primary</span>
											<div class="">
												<input class="wpx-30 h-30 input-color-picker color-primary-light"
													value="#8FBD56" id="colorID" oninput="changePrimaryColor()" type="color"
													data-id="bg-color" data-id1="bg-hover" data-id2="bg-border"
													data-id7="transparentcolor" name="lightPrimary">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Dark Theme Style</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Dark Theme</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch1"
													id="myonoffswitch2" class="onoffswitch2-checkbox">
												<label for="myonoffswitch2" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Dark Primary</span>
											<div class="">
												<input class="wpx-30 h-30 input-dark-color-picker color-primary-dark"
													value="#8FBD56" id="darkPrimaryColorID" oninput="darkPrimaryColor()"
													type="color" data-id="bg-color" data-id1="bg-hover" data-id2="bg-border"
													data-id3="primary" data-id8="transparentcolor" name="darkPrimary">
											</div>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Dark Custom Background</span>
											<div class="">
												<input class="wpx-30 h-30 input-transparent-color-picker color-bg-transparent"
													value="#8FBD56" id="transparentBgColorID" oninput="transparentBgColor()"
													type="color" data-id5="body" data-id6="boxed-theme" name="transparentBackground">
											</div>
										</div>
										<div class="switch-toggle">
											<span class="">Background Image</span>
											<div class="mt-1">
												<a class="bg-img1" href="javascript:void(0);" onclick="bgImage(this)"><img
														src="../assets/images/media/bg-img1.jpg" alt="Bg-Image" id="bgimage1"></a>
												<a class="bg-img2" href="javascript:void(0);" onclick="bgImage(this)"><img
														src="../assets/images/media/bg-img2.jpg" alt="Bg-Image" id="bgimage2"></a>
												<a class="bg-img3" href="javascript:void(0);" onclick="bgImage(this)"><img
														src="../assets/images/media/bg-img3.jpg" alt="Bg-Image" id="bgimage3"></a>
												<a class="bg-img4" href="javascript:void(0);" onclick="bgImage(this)"><img
														src="../assets/images/media/bg-img4.jpg" alt="Bg-Image" id="bgimage4"></a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft menu-styles">
								<h4>Menu Styles</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle lightMenu d-flex">
											<span class="me-auto">Light Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch2"
													id="myonoffswitch3" class="onoffswitch2-checkbox">
												<label for="myonoffswitch3" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle colorMenu d-flex mt-2">
											<span class="me-auto">Color Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch2"
													id="myonoffswitch4" class="onoffswitch2-checkbox">
												<label for="myonoffswitch4" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle darkMenu d-flex mt-2">
											<span class="me-auto">Dark Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch2"
													id="myonoffswitch5" class="onoffswitch2-checkbox">
												<label for="myonoffswitch5" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle gradientMenu d-flex mt-2">
											<span class="me-auto">Gradient Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch2"
													id="myonoffswitch19" class="onoffswitch2-checkbox">
												<label for="myonoffswitch19" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft header-styles">
								<h4>Header Styles</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle lightHeader d-flex">
											<span class="me-auto">Light Header</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch3"
													id="myonoffswitch6" class="onoffswitch2-checkbox">
												<label for="myonoffswitch6" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle  colorHeader d-flex mt-2">
											<span class="me-auto">Color Header</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch3"
													id="myonoffswitch7" class="onoffswitch2-checkbox">
												<label for="myonoffswitch7" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle darkHeader d-flex mt-2">
											<span class="me-auto">Dark Header</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch3"
													id="myonoffswitch8" class="onoffswitch2-checkbox">
												<label for="myonoffswitch8" class="onoffswitch2-label"></label>
											</p>
										</div>

										<div class="switch-toggle darkHeader d-flex mt-2">
											<span class="me-auto">Gradient Header</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch3"
													id="myonoffswitch20" class="onoffswitch2-checkbox">
												<label for="myonoffswitch20" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Layout Width Styles</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">Full Width</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch4"
													id="myonoffswitch9" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch9" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Boxed</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch4"
													id="myonoffswitch10" class="onoffswitch2-checkbox">
												<label for="myonoffswitch10" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Layout Positions</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">Fixed</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch5"
													id="myonoffswitch11" class="onoffswitch2-checkbox" checked>
												<label for="myonoffswitch11" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Scrollable</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch5"
													id="myonoffswitch12" class="onoffswitch2-checkbox">
												<label for="myonoffswitch12" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft leftmenu-styles">
								<h4>Sidemenu layout Styles</h4>
								<div class="skin-body">
									<div class="switch_section">
										<div class="switch-toggle d-flex">
											<span class="me-auto">Default Menu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch6"
													id="myonoffswitch13" class="onoffswitch2-checkbox default-menu" checked>
												<label for="myonoffswitch13" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Icon with Text</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch6"
													id="myonoffswitch14" class="onoffswitch2-checkbox">
												<label for="myonoffswitch14" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Icon Overlay</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch6"
													id="myonoffswitch15" class="onoffswitch2-checkbox">
												<label for="myonoffswitch15" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Closed Sidemenu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch6"
													id="myonoffswitch16" class="onoffswitch2-checkbox">
												<label for="myonoffswitch16" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Hover Submenu</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch6"
													id="myonoffswitch17" class="onoffswitch2-checkbox">
												<label for="myonoffswitch17" class="onoffswitch2-label"></label>
											</p>
										</div>
										<div class="switch-toggle d-flex mt-2">
											<span class="me-auto">Hover Submenu Style 1</span>
											<p class="onoffswitch2"><input type="radio" name="onoffswitch6"
													id="myonoffswitch18" class="onoffswitch2-checkbox">
												<label for="myonoffswitch18" class="onoffswitch2-label"></label>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="swichermainleft">
								<h4>Reset All Styles</h4>
								<div class="skin-body">
									<div class="switch_section my-4">
										<button class="btn btn-danger btn-block" onclick="localStorage.clear();
											document.querySelector('html').style = '';
											names() ;
											resetData() ;" type="button">Reset All
										</button>
									</div>
								</div>
							</div> 
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Switcher -->

		<!-- GLOBAL-LOADER -->
		{{--  <div id="global-loader">
			<img src="{{ asset('/assets/images/loader.svg') }}" class="loader-img" alt="Loader">
		</div>  --}}
		<!-- /GLOBAL-LOADER -->

		<!-- PAGE -->
		<div class="page">
			<div class="page-main">

				<!-- app-Header -->
				@include('layouts.navbar')
				<!-- /app-Header -->

				<!--APP-SIDEBAR-->
				@include('layouts.sidebar')
				<!--/APP-SIDEBAR-->

                <!--app-content open-->
				<div class="app-content main-content mt-0">
					<div class="side-app">
						 <!-- CONTAINER -->
						 <div class="main-container container-fluid">
							<!-- PAGE-HEADER -->
							<div class="page-header">
								<div>
									<h1 class="page-title">@yield('page-title')</h1>
								</div>
								<div class="ms-auto pageheader-btn">
									<ol class="breadcrumb">
										@yield('breadcrumb')
                                        {{--  <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
										<li class="breadcrumb-item active" aria-current="page">Empty</li>  --}}
									</ol>
								</div>
							</div>
							<!-- PAGE-HEADER END -->

							<!-- ROW-1 OPEN -->
							<div class="row">
								<div class="card">
									<div class="card-body">
										@yield('content')
									</div>
								</div>
							</div>

						</div>
					</div>
					<!-- CONTAINER CLOSED -->
				</div>
			</div>

			<!-- FOOTER -->
			@include('layouts.footer')
			<!-- FOOTER CLOSED -->

		</div>

		<!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>


        {{--  MODAL GANTI PASSWORD  --}}
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

        @include('layouts.script')
	</body>
    
</html>
