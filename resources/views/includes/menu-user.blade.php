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
                     <li>
                         <a class="nav-link scrollto" href="{{ route('logout') }}">
                             Signout
                         </a>
                         {{-- <form id="logout-form" action="{{ route('logoutmasyarakat') }}" method="POST" style="display: none;">
                             @csrf
                         </form> --}}
                     </li>
                 </ul>

                 <i class="bi bi-list mobile-nav-toggle"></i>
         </nav><!-- .navbar -->

     </div>
 </header><!-- End Header -->
