<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  @extends('layouts.head')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="/">{{ $headerSettings->app_name }}</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="#" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto {{ (request()->routeIs('landingpage.index')) ? 'active' : '' }}" href="/">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Tentang</a></li>
          <li><a class="nav-link scrollto" href="#services">Manfaat</a></li>
          @if ($globalSettings->link_status == 1)
            <li><a class="nav-link {{ (request()->routeIs('pendaftaran-warga.index')) ? 'active' : '' }}" href="{{ route('pendaftaran-warga.index') }}">Registrasi Warga</a></li>
          @endif
            <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
          @guest
            <li><a class="getstarted scrollto" href="{{ route('login') }}">Login</a></li>
          @else
            <li><a class="getstarted scrollto" href="{{ route('dashboard.index') }}">Dashboard</a></li>
          @endguest
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container d-flex flex-column align-items-center justify-content-center" data-aos="fade-up">
      <h1>{{ $headerSettings->title }}</h1>
      <h2>{{ $headerSettings->subtitle }}</h2>
      @if(request()->routeIs('landingpage.index'))
        <a href="{{ route('pendaftaran-warga.index') }}" class="btn-get-started scrollto">{{ $globalSettings->button_name }}</a>
      @endif
      <img src="{{ Storage::exists('public/' . $globalSettings->image_cover) && $globalSettings->image_cover ? Storage::url($globalSettings->image_cover) : asset('assets/img/hero-img.png') }}" class="img-fluid hero-img" alt="" data-aos="zoom-in" data-aos-delay="150">
      {{-- <img src="{{ asset('assets/img/hero-img.png') }}" class="img-fluid hero-img" alt="" data-aos="zoom-in" data-aos-delay="150"> --}}
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
            <h3>{{ $headerSettings->app_name }}</h3>
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
              @if ($globalSettings->link_status == 1)
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('pendaftaran-warga.index') }}">Registrasi Warga</a></li>
              @endif
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
  <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>

  @stack('customjs')
</body>

</html>