<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

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
        <a class="nav-link {{ (request()->routeIs('DataWargaPindahan.index')) ? '' : 'collapsed' }}" href="{{ route('DataWargaPindahan.index') }}">
          <i class="bi bi-house-door"></i>
          <span>Data Warga Pindahan</span>
        </a>
      </li><!-- Data Warga Pindahan -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('Faq.index')) ? '' : 'collapsed' }}" href="{{ route('Faq.index') }}">
          <i class="bi bi-journals"></i>
          <span>FAQ</span>
        </a>
      </li><!-- FAQ -->

      <li class="nav-item">
        <a class="nav-link {{ (request()->routeIs('setting.layouts.index')) ? '' : 'collapsed' }}" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gear"></i><span>Pengaturan</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content {{ (request()->routeIs('setting.layouts.index')) ? '' : 'collapse' }} " data-bs-parent="#sidebar-nav">
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

    </ul>

</aside>