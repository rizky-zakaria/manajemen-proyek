<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">
                <img src="{{ asset('img/logo.png') }}" alt="" width="150">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
                <a href="{{ url('home') }}" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Data Master </li>
            <li><a class="nav-link" href="{{ route('user.index') }}"><i class="fas fa-users"></i> <span>Data
                        Pegawai</span></a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('jenis-proyek.index') }}"><i class="fas fa-project-diagram"></i>
                    <span>Data Jenis
                        Proyek</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('proyek.index') }}"><i class="fas fa-cogs"></i> <span>Data
                        Proyek</span>
                </a>
            </li>
            <li>
                <a class="nav-link" href="{{ route('progress.index') }}"><i class="fas fa-chart-line"></i> <span>Data
                        Progres Proyek</span>
                </a>
            </li>
            <li><a class="nav-link" href="{{ route('dokumen.index') }}"><i class="fas fa-file"></i> <span>Data
                        Document</span></a>
            </li>
        </ul>

        <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a href="https://getstisla.com/docs" class="btn btn-danger btn-lg btn-block btn-icon-split">
                <i class="fas fa-power-off"></i> Logout
            </a>
        </div>
    </aside>
</div>
