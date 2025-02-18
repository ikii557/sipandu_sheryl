<aside class="main-sidebar sidebar-dark-primary elevation-4" style="background-color: #368960;">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="APM Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">SIPANDU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('dist/img/downloadd.jpeg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{Auth::user()->role}} {{Auth::user()->nama_lengkap}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-header">MASTER DATA</li>
            <li class="nav-item">
                <a href="/dashboard" class="nav-link {{ request()->is('dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            @unless(auth()->user()->role == 'petugas')
            <li class="nav-item">
                <a href="/masyarakat" class="nav-link {{ request()->is('masyarakat', 'tambah_masyarakat', 'edit_masyarakat/*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Masyarakat</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/pegawai" class="nav-link {{ request()->is('pegawai', 'tambah_pegawai', 'edit_pegawai/*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Pegawai</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/kategori" class="nav-link {{ request()->is('kategori', 'tambah_kategori', 'edit_kategori/*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-book"></i>
                    <p>Kategori Pengaduan</p>
                </a>
            </li>
            @endunless
            <li class="nav-header">LAPORAN</li>
            <li class="nav-item">
                <a href="/pengaduan" class="nav-link {{ request()->is('pengaduan', 'tambah_pengaduan', 'edit_pengaduan/*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-envelope"></i>
                    <p>Pengaduan Masuk</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/tanggapan" class="nav-link {{ request()->is('tanggapan', 'tambah_tanggapan/', 'edit_tanggapan/') ? 'active' : '' }}">
                <i class="nav-icon fas fa-comments"></i>
                <p>Tanggapan</p>
                </a>
            </li>
            @unless(auth()->user()->role == 'petugas')
            <li class="nav-header">Report</li>
            <li class="nav-item">
                <a href="/generate" class="nav-link {{ request()->is('generate', 'generate/*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-print"></i>
                    <p>Generate Report</p>
                </a>
            </li>
            <li class="nav-header">Account</li>
            <li class="nav-item">
                <a href="/profile" class="nav-link {{ request()->is('profile', 'edit_profile') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Profile</p>
                </a>
            </li>
            @endunless
            <li class="nav-item">
            <form method="GET" action="/logout">
                @csrf
                <button type="submit" class="btn btn-secondary btn-md">
                    <i class="fa fa-sign-out-alt"></i> Logout
                </button>
            </form>

            </li>
        </ul>
    </nav>



        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
        </aside>