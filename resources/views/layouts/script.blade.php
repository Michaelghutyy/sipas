<!-- JQUERY JS -->
		<script src="{{ asset('/assets/js/jquery.min.js') }}"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{ asset('/assets/plugins/bootstrap/js/popper.min.js') }}"></script>
		<script src="{{ asset('/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

		<!-- SIDE-MENU JS -->
		<script src="{{ asset('/assets/plugins/sidemenu/sidemenu.js') }}"></script>

		<!-- Perfect SCROLLBAR JS-->
		<script src="{{ asset('/assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>
		<script src="{{ asset('/assets/plugins/p-scroll/pscroll.js') }}"></script>

		<!-- STICKY JS -->
		<script src="{{ asset('/assets/js/sticky.js') }}"></script>

		<!-- COLOR THEME JS -->
		<script src="{{ asset('/assets/js/themeColors.js') }}"></script>

		<!-- CUSTOM JS -->
		<script src="{{ asset('/assets/js/custom1.js') }}"></script>

		<!-- SWITCHER JS -->
		<script src="{{ asset('/assets/switcher/js/switcher.js') }}"></script>

		{{--  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>  --}}
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('vendor/DataTables/datatables.min.js') }}"></script>
        @stack('customjs')
