<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SIPANDU</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="/assetsuser/img/favicon.png" rel="icon">
    <link href="/assetsuser/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assetsuser/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assetsuser/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assetsuser/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assetsuser/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assetsuser/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assetsuser/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: eNno - v4.10.0
  * Template URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html">SIPANDU</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#featured-services">information</a></li>
                    <li><a class="nav-link scrollto" href="#contact">Kontak Kami</a></li>
                    <li><a class="nav-link scrollto" href="/register">Register</a></li>
                    <li><a class="nav-link scrollto" href="/login">Login</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>SIPANDU</h1>
                    <h5>Sistem Pengaduan Terpadu.</h5>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="/assetsuser/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Featured Services Section ======= -->
        <section id="featured-services" class="featured-services">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-laptop"></i></div>
                            <h4 class="title"><a href="">Pelayanan 24 Jam</a></h4>
                            <p class="description">Pelayanan selama 24 jam, sampaikan aduan anda kapan saja, dimana saja dan jam
                                berapa saja.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-card-checklist"></i></div>
                            <h4 class="title"><a href="">Identitas terlindungi</a></h4>
                            <p class="description">Setiap data Identitas pengaduan yang dilakukan oleh masyarakat kami lindungi secara
                                aman </p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-clipboard-data"></i></div>
                            <h4 class="title"><a href="">Penanganan Cepat</a></h4>
                            <p class="description">Penanganan pengaduan yang di sampaikan, akan kami proses secara cepat</p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Featured Services Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container mt-5">

                <div class="row counters">

                    <div class="col-lg-4 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end={{ \App\Models\User::where('role', 'masyarakat')->count()}} data-purecounter-duration="1" class="purecounter"></span>
                        <p>Masyarakat</p>
                    </div>

                    <div class="col-lg-4 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="{{ \App\Models\Pengaduan::count() }}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Pengaduan</p>
                    </div>

                    <div class="col-lg-4 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="{{ \App\Models\KategoriPengaduan::count() }}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Kategori Pengaduan</p>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <span>Kontak Kami</span>
                    <h2>Kontak Kami</h2>
                </div>

                <div class="row">

                    <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Alamat:</h4>
                                <p>Jl. Banyu Mengalir No. 123 Jawa Barat KP. 12345</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p>info@apm.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call Center:</h4>
                                <p>+1 1233456788</p>
                            </div>

                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container footer-bottom clearfix">
            <div class="copyright">
                &copy; Copyright <strong><span>APPUR</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/enno-free-simple-bootstrap-template/ -->
                Template By <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assetsuser/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/assetsuser/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assetsuser/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assetsuser/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assetsuser/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assetsuser/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="/assetsuser/js/main.js"></script>

</body>

</html>
