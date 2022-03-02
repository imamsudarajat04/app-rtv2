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
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-person-badge-fill"></i>
          <span>Data RT</span>
        </a>
      </li><!-- Data RT -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#">
          <i class="bi bi-person-lines-fill"></i>
          <span>Data Warga</span>
        </a>
      </li><!-- Data Warga -->

    </ul>

</aside>