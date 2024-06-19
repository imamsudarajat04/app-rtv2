@extends('layouts.master')

@section('title', 'Halaman Beranda')

@section('content')
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
  
          <div class="row no-gutters">
            <div class="content col-xl-5 d-flex align-items-stretch" data-aos="fade-right">
              <div class="content">
                <h3>{{ $abouts->title }}</h3>
                <p>
                  {{ $abouts->description }}
                </p>
                {{-- <a href="#" class="about-btn">About us <i class="bx bx-chevron-right"></i></a> --}}
              </div>
            </div>
            <div class="col-xl-7 d-flex align-items-stretch" data-aos="fade-left">
              <div class="icon-boxes d-flex flex-column justify-content-center">
                <div class="row">
                  <div class="col-md-4 icon-box" data-aos="fade-up" data-aos-delay="100">
                    <h4>{{ $abouts->title_one }}</h4>
                    <p>{{ $abouts->subtitle_one }}</p>
                  </div>
                  <div class="col-md-4 icon-box" data-aos="fade-up" data-aos-delay="200">
                    <h4>{{ $abouts->title_two }}</h4>
                    <p>{{ $abouts->subtitle_two }}</p>
                  </div>
                  <div class="col-md-4 icon-box" data-aos="fade-up" data-aos-delay="300">
                    <h4>{{ $abouts->title_three }}</h4>
                    <p>{{ $abouts->subtitle_three }}</p>
                  </div>
                  <div class="col-md-4 icon-box" data-aos="fade-up" data-aos-delay="400">
                    <h4>{{ $abouts->title_four }}</h4>
                    <p>{{ $abouts->subtitle_four }}</p>
                  </div>
                  <div class="col-md-4 icon-box" data-aos="fade-up" data-aos-delay="400">
                    <h4>{{ $abouts->title_five }}</h4>
                    <p>{{ $abouts->subtitle_five }}</p>
                  </div>
                </div>
              </div><!-- End .content-->
            </div>
          </div>
  
        </div>
      </section><!-- End About Section -->
  
      <!-- ======= Features Section ======= -->
      <section id="features" class="features" data-aos="fade-up">
        <div class="container">
  
          <div class="section-title">
            <h2>Biodata</h2>
            {{-- <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p> --}}
          </div>
  
          <div class="row content">
            <div class="col-md-5" data-aos="fade-right" data-aos-delay="100">
              <img src="{!! asset('assets/img/profile-bu-lurah.jpg') !!}" class="img-fluid" alt="Foto Lurah">
            </div>
            <div class="col-md-7 pt-4" data-aos="fade-left" data-aos-delay="100">
              <h3>Tugas Pokok dan Fungsi Lurah </h3>
              <ul>
                <li><i class="bi bi-check"></i> Melaksanakan kordinasi pelaksanan, perencanaan, pengawasan pengendalian dibidang pemeliharaan ketertiban umum, bidang penegakan peraturan perundang undangan, bidang pelayanan umum masyarakat, bidang sarana dan prasarana pasilitas umum.</li>
                <li><i class="bi bi-check"></i> Melaksanakan pembinaan dan pengawasan pelaksanaan tugas pemerintah diwilayah kerja dan pelaksanaan administrasi ketatausahaan kelurahan.</li>
                <li><i class="bi bi-check"></i> Melaksanakan pembinaan dan koordinasi terhadap bawahan, terhadap pelaksanaan tugas-tugas jabatan fungsional umum dan lingkungan kelurahan.</li>
                <li><i class="bi bi-check"></i> Melaksanakan pemberian motivasi dan menetapkan kebijakan dalam rangka pemberdayaan masyarakat yang mandiri.</li>
                <li><i class="bi bi-check"></i> Melaporkan hasil kerja pelaksanaan tugas kepada camat setiap bulan dan akhir tahun.</li>
                <li><i class="bi bi-check"></i> Melaksanakan tugas dari pemerintah atasan.</li>
              </ul>
            </div>
          </div>
  
          <div class="row content justify-content-center mb-5">
            <div class="col-md-5 order-1 order-md-2" data-aos="fade-center">
              <div class="">
                <img src="{!! asset('assets/img/PANRB.jpg') !!}" class="img-fluid" alt="Profile Ketua Forum">
              </div>
            </div>
          </div>

        {{-- Grid Start --}}
        <div class="row portfolio-container">

          <div class="col-lg-4 col-md-6 mb-2 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{!! asset('assets/img/document/PembuatanKK.jpg') !!}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-2 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="{!! asset('assets/img/document/PembuatanKTP.jpg') !!}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-2 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{!! asset('assets/img/document/PengurusanIMB.jpg') !!}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-2 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="{!! asset('assets/img/document/PengurusanTanah.png') !!}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-2 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="{!! asset('assets/img/document/SuratKeteranganAhliWaris.jpg') !!}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-2 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{!! asset('assets/img/document/SuratKeteranganDomisiliUsaha.png') !!}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-2 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="{!! asset('assets/img/document/SuratKeteranganLain-Lain.jpg') !!}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-2 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="{!! asset('assets/img/document/SuratKeteranganUsaha.jpg') !!}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-2 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="{!! asset('assets/img/document/SuratPengantarKematian.jpg') !!}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-2 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="{!! asset('assets/img/document/SuratPengantarNikah.jpg') !!}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-2 portfolio-item filter-card">
            <div class="portfolio-wrap">
              <img src="{!! asset('assets/img/document/SuratPindahDatang.jpg') !!}" class="img-fluid" alt="">
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-2 portfolio-item filter-web">
            <div class="portfolio-wrap">
              <img src="{!! asset('assets/img/document/SuratPindahKeluar.jpg') !!}" class="img-fluid" alt="">
            </div>
          </div>

        </div>
        {{-- Grid End --}}
  
        </div>
      </section><!-- End Features Section -->
  
      <!-- ======= Manfaat Section ======= -->
      <section id="services" class="services">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>{{ $manfaatSettings->title }}</h2>
            <p>{{ $manfaatSettings->description }}</p>
          </div>
  
          <div class="row">
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
              <div class="icon-box">
                <div class="icon"><i class="{{ $manfaatSettings->icon_one }}"></i></div>
                <h4 class="title"><a href="">{{ $manfaatSettings->title_one }}</a></h4>
                <p class="description">{{ $manfaatSettings->short_description_one }}</p>
              </div>
            </div>
  
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="200">
              <div class="icon-box">
                <div class="icon"><i class="{{ $manfaatSettings->icon_two }}"></i></div>
                <h4 class="title"><a href="">{{ $manfaatSettings->title_two }}</a></h4>
                <p class="description">{{ $manfaatSettings->short_description_two }}</p>
              </div>
            </div>
  
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="300">
              <div class="icon-box">
                <div class="icon"><i class="{{ $manfaatSettings->icon_three }}"></i></div>
                <h4 class="title"><a href="">{{ $manfaatSettings->title_three }}</a></h4>
                <p class="description">{{ $manfaatSettings->short_description_three }}</p>
              </div>
            </div>
  
            <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="400">
              <div class="icon-box">
                <div class="icon"><i class="{{ $manfaatSettings->icon_four }}"></i></div>
                <h4 class="title"><a href="">{{ $manfaatSettings->title_four }}</a></h4>
                <p class="description">{{ $manfaatSettings->short_description_four }}</p>
              </div>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Services Section -->
  
      <!-- ======= Frequently Asked Questions Section ======= -->
      <section id="faq" class="faq">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>F.A.Q</h2>
          </div>
  
          <ul class="faq-list">
            
            @foreach ($faqs as $faq)    
              <li>
                <div data-bs-toggle="collapse" class="collapsed question" href="#faq{{ $faq->id }}">{{ $faq->question }} <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
                <div id="faq{{ $faq->id }}" class="collapse" data-bs-parent=".faq-list">
                  <p>
                    {{ $faq->answer }}
                  </p>
                </div>
              </li>
            @endforeach
  
          </ul>
  
        </div>
      </section><!-- End Frequently Asked Questions Section -->
  
      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact section-bg">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Kontak & Pengaduan</h2>
          </div>
  
          <div class="row">
  
            <div class="col-lg-6">
  
              <div class="row">
                <div class="col-md-12">
                  <div class="info-box">
                    <i class="bx bx-map"></i>
                    <h3>Alamat</h3>
                    <p>{{ $footerSettings->alamat }}</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box mt-4">
                    <i class="bx bx-envelope"></i>
                    <h3>Email</h3>
                    <p>{{ $footerSettings->email }}</p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="info-box mt-4">
                    <i class="bx bx-phone-call"></i>
                    <h3>Telepon</h3>
                    <p>{{ $footerSettings->telepon1 }}<br>{{ $footerSettings->telepon2 }}</p>
                  </div>
                </div>
              </div>
  
            </div>
  
            <div class="col-lg-6 mt-4 mt-md-0">

              <!-- Alert -->
              @if ($message = Session::get('success'))
                <script>window.alert("{{ $message }}")</script>
              @endif

              <form action="{{ route('pengaduan-suara.store') }}" method="post" role="form" class="php-email-form">
                @csrf
                <div class="row">
                  <div class="col-md-12 form-group">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Lengkap">
                  </div>
                </div>

                <div class="form-group mt-3">
                  <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Judul">
                </div>

                <div class="form-group mt-3">
                  <textarea class="form-control @error('message') is-invalid @enderror" name="message" rows="5" placeholder="Pesan"></textarea>
                </div>

                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>

                <div class="text-center"><button type="submit">Kirim Pesan</button></div>
              </form>
            </div>
  
          </div>
  
        </div>
      </section><!-- End Contact Section -->
@endsection