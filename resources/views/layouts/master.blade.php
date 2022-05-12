<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  @extends('layouts.head')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="#">Bikin</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="#" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
          <li><a class="nav-link scrollto" href="#services">Manfaat</a></li>
          <li><a class="nav-link" href="#">Registrasi Warga</a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
          <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container d-flex flex-column align-items-center justify-content-center" data-aos="fade-up">
      <h1>Build Better Websites With Bikin</h1>
      <h2>We are team of talented designers making websites with Bootstrap</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
      <img src="assets/img/hero-img.png" class="img-fluid hero-img" alt="" data-aos="zoom-in" data-aos-delay="150">
    </div>

  </section><!-- End Hero -->

  <main id="main">
    @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Bikin</h3>
            <p>
              {{ $footerSettings->alamat }}<br><br>
              <strong>Telepon:</strong> {{ $footerSettings->telepon1 }}<br>
              <strong>Email:</strong> {{ $footerSettings->email }}<br>
            </p>
          </div>

          <div class="col-lg-5 col-md-7 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="/">Beranda</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#about">Tentang</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#services">Manfaat</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Registrasi Warga</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#contanct">Kontak</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Join Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          {{ $footerSettings->copyright }}
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="{{ $footerSettings->twitter }}" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="{{ $footerSettings->facebook }}" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="{{ $footerSettings->instagram }}" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="{{ $footerSettings->youtube }}" class="google-plus"><i class="bx bxl-youtube"></i></a>
        <a href="{{ $footerSettings->whatsapp }}" class="linkedin"><i class="bx bxl-whatsapp"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/mainlandingpage.js') }}"></script>

</body>

</html>