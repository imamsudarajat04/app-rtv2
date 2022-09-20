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
              <img src="assets/img/profile-lurah.jpg" class="img-fluid" alt="Foto Lurah">
            </div>
            <div class="col-md-7 pt-4" data-aos="fade-left" data-aos-delay="100">
              <h3>Tugas Pokok dan Fungsi Lurah </h3>
              {{-- <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p> --}}
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
  
          <div class="row content">
            <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
              <img src="assets/img/profile-ketua-forum.jpg" class="img-fluid" alt="Profile Ketua Forum">
            </div>
            <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
              <h3>Fungsi dan Tugas Forum RT/RW</h3>
              <p>Peran Forum RT/RW ini pada dasarnya merupakan perpanjangan tangan dari kecamatan dengan fungsinya, antara lain :</p>
              <ul>
                <li><i class="bi bi-check"></i> Sebagai wadah silaturahmi sekaligus menguatkan tugas dan fungsi forum RT/RW di tiap-tiap Kelurahan.</li>
                <li><i class="bi bi-check"></i> Sebagai sarana penyampaian aspirasi dalam penyelesaian permasalahan.</li>
                <li><i class="bi bi-check"></i> Sebagai wadah dalam penyeragaman sistem pembinaan untuk mendukung pelaksanaan program kegiatan kecamatan agar lebih terarah.</li>
              </ul>
            </div>
          </div>
  
          <div class="row content">
            <div class="col-md-5" data-aos="fade-right">
              <img src="assets/img/profile-jojo.jpg" class="img-fluid" alt="Profile Jojok Sutrisno">
            </div>
            <div class="col-md-7 pt-5" data-aos="fade-left">
              <h3>Data diri Jojok Sutrisno</h3>
              <p>Keterangan :</p>
              <ul>
                <li><i class="bi bi-check"></i> Relawan sebagai Pembina dan Penilai dlm bidang Sekolah Adywiyata tingkat SD,SMP,SLTA baik tingkat kota maupun tingkat Provinsi.</li>
                <li><i class="bi bi-check"></i> Relawan sebagai anggota pd prapantau dlm bidang Adipura tingkat kota.</li>
                <li><i class="bi bi-check"></i> Relawan sebagai ketua dua pd Forum Kota Sehat tingkat kota.</li>
                <li><i class="bi bi-check"></i> Relawan sebagai diPokja Penelitian dan Pengembangan pd Forum Koordinasi BPDAS Provinsi Kepri.</li>
              </ul>
            </div>
          </div>
  
          <div class="row content">
            <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
              <img src="assets/img/profile-ketua-karang-taruna.jpg" class="img-fluid" alt="Profile Ketua Karang Taruna">
            </div>
            <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
              <h3>Profil Ketua Karang Taruna</h3>
              <p>
                Karang Taruna adalah organisasi sosial kemasyarakatan sebagai wadah dan sarana pengembangan setiap anggota masyarakat yang tumbuh dan berkembang atas dasar kesadaran dan tanggung jawab sosial dari, oleh dan untuk masyarakat terutama generasi muda di wilayah desa/kelurahan terutama bergerak dibidang usaha kesejahteraan sosial.
              </p>
            </div>
          </div>
  
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