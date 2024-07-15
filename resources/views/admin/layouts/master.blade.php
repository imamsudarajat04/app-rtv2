<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.layouts.header')
</head>

<body>

  <!-- ======= Header ======= -->
    @include('admin.layouts.nav')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
    @include('admin.layouts.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">
    @yield('content')
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
    @include('admin.layouts.footer')
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js') }}"></script>
  
  <script type="text/javascript" src="{{ asset('assets/vendor/datatables/datatables.min.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  
  @stack('customjs')
</body>

</html>