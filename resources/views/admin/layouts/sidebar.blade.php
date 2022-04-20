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
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-house-door"></i>
          <span>Data Warga Pindahan</span>
        </a>
      </li><!-- Data Warga Pindahan-->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-gear"></i>
          <span>Setting</span>
        </a>
      </li><!-- Data Warga Pindahan-->

    </ul>

</aside>