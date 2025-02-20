 <!-- ======= Header ======= -->
 <header id="header" class="fixed-top">
     <div class="container d-flex align-items-center justify-content-between">

         <h1 class="logo"><a href="index.html">SIPANDU</a></h1>
         <!-- Uncomment below if you prefer to use an image logo -->
         <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

         <nav id="navbar" class="navbar">
             <ul>
                 <ul>
                     <li><a class="nav-link scrollto {{ Request::is('pengaduanku/*') ? 'active' : '' }}" href="/pengaduanku">Pengaduanku</a></li>
                     <li>
                         <a class="nav-link scrollto {{ Request::is('profile*') ? 'active' : '' }}" href="/profileuser" style="margin-right: 15px;">
                             Profile
                         </a>
                     </li>


                     <!-- Signout tanpa button, menggunakan <a> -->
                        @if(Auth::check())
                        <!-- Jika sudah login, tampilkan tombol Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-secondary btn-md">
                                <i class="fa fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    @else
                        <!-- Jika belum login, tampilkan tombol Login/Register -->
                        <a href="{{ route('login') }}" class="btn btn-primary btn-md">
                            <i class="fa fa-sign-in-alt"></i> Login
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-success btn-md">
                            <i class="fa fa-user-plus"></i> Register
                        </a>
                    @endif
                    
                 </ul>

                 <i class="bi bi-list mobile-nav-toggle"></i>
         </nav><!-- .navbar -->

     </div>
 </header><!-- End Header -->
