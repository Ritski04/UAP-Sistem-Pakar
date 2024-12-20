<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <!-- <a href="" class="logo">
                <img src="{{ asset('') }}assets/img/kaiadmin/logo_light.svg" alt="navbar brand" class="navbar-brand"
                    height="20" />
            </a> -->
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Kelola data</h4>
                </li>
                <li class="nav-item {{ Request::is('pengguna') ? 'active' : '' }}">
                    <a href="{{ route('pengguna.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('penyakit') ? 'active' : '' }}">
                    <a href="{{ route('penyakit.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-medkit"></i>
                        <p>Penyakit</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('gejala') ? 'active' : '' }}">
                    <a href="{{ route('gejala.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-file-medical"></i>
                        <p>Gejala</p>
                    </a>
                </li>
                <li class="nav-item {{ Request::is('basis') ? 'active' : '' }}">
                    <a href="{{ route('basis.index') }}" class="collapsed" aria-expanded="false">
                        <i class="fas fa-database"></i>
                        <p>Basis Pengetahuan</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>