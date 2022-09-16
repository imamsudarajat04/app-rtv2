<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      @if(Auth::user()->role == 'superadmin')

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('dashboard.index')) ? '' : 'collapsed' }}" href="{{ route('dashboard.index') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('DataAkun.index')) ? '' : 'collapsed' }}" href="{{ route('DataAkun.index') }}">
          <i class="bi bi-person"></i>
          <span>Data Akun</span>
        </a>
      </li><!-- Data Akun  -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('DataRT.index')) ? '' : 'collapsed' }}" href="{{ route('DataRT.index') }}">
          <i class="bi bi-person-badge-fill"></i>
          <span>Data RT</span>
        </a>
      </li><!-- Data RT -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('DataWarga.index')) ? '' : 'collapsed' }}" href="{{ route('DataWarga.index') }}">
          <i class="bi bi-person-lines-fill"></i>
          <span>Data Warga</span>
        </a>
      </li><!-- Data Warga -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('DataBalita.index')) ? '' : 'collapsed' }}" href="{{ route('DataBalita.index') }}">
          <i class="fas fa-baby"></i>
          <span>Data Balita</span>
        </a>
      </li><!-- Data Warga Balita -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('DataLansia.index')) ? '' : 'collapsed' }}" href="{{ route('DataLansia.index') }}">
          <i class="fas fa-male"></i> 
          <span>Data Lansia</span>
        </a>
      </li><!-- Data Warga Lansia -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('DataWargaPindahan.index')) ? '' : 'collapsed' }}" href="{{ route('DataWargaPindahan.index') }}">
          <i class="bi bi-house-door"></i>
          <span>Data Warga Pindahan</span>
        </a>
      </li><!-- Data Warga Pindahan -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('DataWargaDisabilitas.index')) ? '' : 'collapsed' }}" href="{{ route('DataWargaDisabilitas.index') }}">
          <i class="fas fa-wheelchair"></i>
          <span>Data Warga Disabilitas</span>
        </a>
      </li><!-- Data Warga Disabilitas -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('DataWargaBantuanPemerintah.index')) ? '' : 'collapsed' }}" href="{{ route('DataWargaBantuanPemerintah.index') }}">
          <i class="fas fa-people-carry"></i>
          <span>Data Warga Bantuan Pemerintah</span>
        </a>
      </li><!-- Data Warga Bantuan Pemerintah -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('DataWargaPria.index')) ? '' : 'collapsed' }}" href="{{ route('DataWargaPria.index') }}">
          <i class="fas fa-male"></i>
          <span>Data Warga Pria</span>
        </a>
      </li><!-- Data Warga Pria -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('DataWargaPerempuan.index')) ? '' : 'collapsed' }}" href="{{ route('DataWargaPerempuan.index') }}">
          <i class="fas fa-female"></i>
          <span>Data Warga Perempuan</span>
        </a>
      </li><!-- Data Warga Perempuan -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('Faq.index')) ? '' : 'collapsed' }}" href="{{ route('Faq.index') }}">
          <i class="bi bi-journals"></i>
          <span>FAQ</span>
        </a>
      </li><!-- FAQ -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('pengaduan-suara-admin.index')) ? '' : 'collapsed' }}" href="{{ route('pengaduan-suara-admin.index') }}">
          <i class="bi bi-envelope"></i>
          <span>Pengaduan</span>
        </a>
      </li><!-- Pengaduan -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('setting.layouts.index')) ? '' : 'collapsed' }}" data-bs-target="#icons-nav1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-file-earmark-arrow-down"></i><span>Export Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav1" class="nav-content {{ (request()->routeIs('setting.layouts.index')) ? '' : 'collapse' }} " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('DataRT.Export') }}">
              <i class="bi bi-circle"></i><span>Data RT</span>
            </a> 
          </li>

          <li>
            <a href="{{ route('DataWarga.export') }}">
              <i class="bi bi-circle"></i><span>Data Warga</span>
            </a> 
          </li>

          <li>
            <a href="{{ route('DataWargaPindahan.export') }}">
              <i class="bi bi-circle"></i><span>Data Warga Pindahan</span>
            </a> 
          </li>

          <li>
            <a href="{{ route('DataWargaBalita.export') }}">
              <i class="bi bi-circle"></i><span>Data Warga Kategori Balita</span>
            </a> 
          </li>

          <li>
            <a href="{{ route('DataWargaLansia.export') }}">
              <i class="bi bi-circle"></i><span>Data Warga Kategori Lansia</span>
            </a> 
          </li>

          <li>
            <a href="{{ route('DataWargaDisabilitas.export') }}">
              <i class="bi bi-circle"></i><span>Data Warga Kategori Disabilitas</span>
            </a> 
          </li>

          <li>
            <a href="{{ route('DataWargaBantuanPemerintah.export') }}">
              <i class="bi bi-circle"></i><span>Data Warga Kategori Bantuan Pemerintah</span>
            </a> 
          </li>
        </ul>
      </li><!-- Export Data -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('setting.layouts.index')) ? '' : 'collapsed' }}" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear"></i><span>Pengaturan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content {{ (request()->routeIs('setting.layouts.index')) ? '' : 'collapse' }} " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ route('manfaat-setting.index') }}">
              <i class="bi bi-circle"></i><span>Pengaturan Manfaat</span>
            </a>
          </li>
          <li>
            <a href="{{ route('abouts-setting.index') }}">
              <i class="bi bi-circle"></i><span>Pengaturan About</span>
            </a>
          </li>
          <li>
            <a href="{{ route('header-setting.index') }}">
              <i class="bi bi-circle"></i><span>Pengaturan Header</span>
            </a>
          </li>
          <li>
            <a href="{{ route('global-setting.index') }}">
              <i class="bi bi-circle"></i><span>Pengaturan Global</span>
            </a>
          </li>
          <li>
            <a href="{{ route('footer-setting.index') }}">
              <i class="bi bi-circle"></i><span>Pengaturan Footer</span>
            </a>
          </li>
        </ul>
      </li><!-- Pengaturan -->
      @endif

      @if(Auth::user()->role == 'rt')

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('dashboard.index')) ? '' : 'collapsed' }}" href="{{ route('dashboard.index') }}">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('DataWargaRT.index')) ? '' : 'collapsed' }}" href="{{ route('DataWargaRT.index') }}">
          <i class="bi bi-person-lines-fill"></i>
          <span>Data Warga</span>
        </a>
      </li><!-- Data Warga -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('DataWargaPindahanRT.index')) ? '' : 'collapsed' }}" href="{{ route('DataWargaPindahanRT.index') }}">
          <i class="bi bi-house-door"></i>
          <span>Data Warga Pindahan</span>
        </a>
      </li><!-- Data Warga Pindahan -->

      @endif
    </ul>

</aside>