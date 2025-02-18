<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="APM Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIPANDU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <!-- Check if user is authenticated -->
                @if(auth()->check())
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                @else
                <a href="/loginpetugas" class="d-block">Login</a>
                @endif
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">MASTER DATA</li>
                <li class="nav-item">
                    <a href="/dashboardpetugas" class="nav-link {{ Request::is('dashboard*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">LAPORAN</li>
                <li class="nav-item">
                    <a href="/laporanmasukpetugas" class="nav-link {{ Request::is('laporanmasukpetugas*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Laporan Masuk
                        </p>
                    </a>
                </li>
                <li class="nav-header">Account</li>
                <li class="nav-item">
                    <a href="{{ Route('petugas.profile.indexpetugas') }}" class="nav-link {{ Request::is('petugas/profile*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Profile
                        </p>
                    </a>
                </li>

                <!-- Logout button -->
                <form action="{{ route('logoutpetugas') }}" method="POST" style="display: flex; justify-content: center;">
                    @csrf
                    <button type="submit" class="btn btn-secondary btn-md" style="padding: 8px 83px;">
                        <i class="fa fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
