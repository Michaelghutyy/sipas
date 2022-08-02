<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link @yield('dashboard')" href="{{ route('home') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                Dashboard
            </a>
            <div class="sb-sidenav-menu-heading">Fitur</div>
            <a class="nav-link @yield('suratmasuk')" href="{{ route('surat-masuk.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-mail-bulk"></i></div>
                Surat Masuk
            </a>
            <a class="nav-link @yield('suratkeluar')" href="{{ route('surat-keluar.index') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-paper-plane"></i></div>
                Surat Keluar
            </a>
        </div>
    </div>
</nav>