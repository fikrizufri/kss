<aside class="main-sidebar sidebar-collapse sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('home')}}" class="brand-link">
    <img src="{{asset('template/dist/img/logo.png')}}" width="30%" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Dashboard</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <!-- <img src="{{asset('template/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image"> -->
      </div>
      <div class="info">
        <a href="{{route('user.ubah')}}" class="d-block">{{ucfirst(Auth::user()->name)}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class  with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('home')}}" class="nav-link {{ Request::is('/') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        @can('view-badan','view-fraksi','view-komisi')

        <li class="nav-item has-treeview {{ Request::segment(1) === 'badan' ? 'menu-open' : '' }} {{ Request::segment(1) === 'komisi' ? 'menu-open' : '' }} {{ Request::segment(1) === 'fraksi' ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::segment(1) === 'badan'? 'active' : '' }} {{ Request::segment(1) === 'komisi' ? 'active' : '' }} {{ Request::segment(1) === 'fraksi' ? 'active' : '' }}">
            <i class="nav-icon fa fa-university"></i>
            <p>
              Alat Kelengkapan
              <i class=" fas fa-angle-left right"></i>
            </p>
          </a>
          @can('view-badan')
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('badan.index')}}" class="nav-link {{ Request::segment(1) === 'badan' ? 'active' : '' }}">
                <i class="fa fa-balance-scale nav-icon"></i>
                <p>Badan</p>
              </a>
            </li>
          </ul>
          @endcan
          @can('view-komisi')
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('komisi.index')}}" class="nav-link {{ Request::segment(1) === 'komisi' ? 'active' : '' }}">
                <i class="fa fa-gavel nav-icon"></i>
                <p>Komisi</p>
              </a>
            </li>
          </ul>
          @endcan
          @can('view-fraksi')
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('fraksi.index')}}" class="nav-link {{ Request::segment(1) === 'fraksi' ? 'active' : '' }}">
                <i class="fa fa-american-sign-language-interpreting nav-icon"></i>
                <p>Fraksi</p>
              </a>
            </li>
          </ul>
          @endcan
        </li>
        @endcan
        @can('view-jabatan')

        <li class="nav-item has-treeview {{ Request::segment(1) === 'jabatan' ? 'menu-open' : '' }} {{ Request::segment(1) === 'masa-sidang' ? 'menu-open' : '' }} {{ Request::segment(1) === 'jenis-rapat' ? 'menu-open' : '' }} {{ Request::segment(1) === 'sifat-rapat' ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::segment(1) === 'jabatan'? 'active' : '' }} {{ Request::segment(1) === 'masa-sidang' ? 'active' : '' }} {{ Request::segment(1) === 'jenis-rapat' ? 'active' : '' }} {{ Request::segment(1) === 'sifat-rapat' ? 'active' : '' }} ">
            <i class="nav-icon fa fa-book"></i>
            <p>
              Master Data
              <i class=" fas fa-angle-left right"></i>
            </p>
          </a>
          @can('view-jabatan')
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('jabatan.index')}}" class="nav-link {{ Request::segment(1) === 'jabatan' ? 'active' : '' }}">
                <i class="fa fa-balance-scale nav-icon"></i>
                <p>Jabatan</p>
              </a>
            </li>
          </ul>
          @endcan
          @can('view-masa-sidang')
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('masa-sidang.index')}}" class="nav-link {{ Request::segment(1) === 'masa-sidang' ? 'active' : '' }}">
                <i class="fa fa-hourglass-half nav-icon"></i>
                <p>Masa Sidang</p>
              </a>
            </li>
          </ul>
          @endcan
          @can('view-jenis-rapat')
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('jenis-rapat.index')}}" class="nav-link {{ Request::segment(1) === 'jenis-rapat' ? 'active' : '' }}">
                <i class="fa fa-gavel nav-icon"></i>
                <p>Jenis Rapat</p>
              </a>
            </li>
          </ul>
          @endcan
          @can('view-sifat-rapat')
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('sifat-rapat.index')}}" class="nav-link {{ Request::segment(1) === 'sifat-rapat' ? 'active' : '' }}">
                <i class="fa fa-map-signs nav-icon"></i>
                <p>Sifat Rapat</p>
              </a>
            </li>
          </ul>
          @endcan
          @can('view-tempat')
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('tempat.index')}}" class="nav-link {{ Request::segment(1) === 'tempat' ? 'active' : '' }}">
                <i class="fa fa-map-signs nav-icon"></i>
                <p>Tempat Rapat</p>
              </a>
            </li>
          </ul>
          @endcan
        </li>
        @endcan

        @can('view-pegawai')
        <li class="nav-item">
          <a href="{{route('pegawai.index')}}" class="nav-link {{ Request::is('pegawai') ? 'active' : '' }}">
            <i class="nav-icon fa fa-users"></i>
            <p>
              Sekretariat DRPD
            </p>
          </a>
        </li>
        @endcan
        @can('view-anggota')
        <li class="nav-item">
          <a href="{{route('anggota.index')}}" class="nav-link {{ Request::is('anggota') ? 'active' : '' }}">
            <i class="nav-icon fa fa-user-circle"></i>
            <p>
              Anggota
            </p>
          </a>
        </li>
        @endcan
        @can('view-rapat')
        <li class="nav-item">
          <a href="{{route('rapat.index')}}" class="nav-link {{ Request::is('rapat') ? 'active' : '' }}">
            <i class="nav-icon fa fa-microphone"></i>
            <p>
              Rapat
            </p>
          </a>
        </li>
        @endcan
        @can('view-user')

        <li class="nav-item has-treeview {{ Request::segment(1) === 'user' ? 'menu-open' : '' }} {{ Request::segment(1) === 'role' ? 'menu-open' : '' }} {{ Request::segment(1) === 'task' ? 'menu-open' : '' }}">
          <a href="#" class="nav-link {{ Request::segment(1) === 'user'? 'active' : '' }} {{ Request::segment(1) === 'role' ? 'active' : '' }}  {{ Request::segment(1) === 'task' ? 'active' : '' }}">
            <i class=" nav-icon fas fa-table"></i>
            <p>
              Pengguna
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('user.index')}}" class="nav-link {{ Request::segment(1) === 'user' ? 'active' : '' }}">
                <i class="far fa-user nav-icon"></i>
                <p>Pengguna</p>
              </a>
            </li>
          </ul>

          @can('view-roles')
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('role.index')}}" class="nav-link {{ Request::segment(1) === 'role' ? 'active' : '' }}">
                <i class="fa fa-key nav-icon"></i>
                <p>Hak Akses</p>
              </a>
            </li>
          </ul>
          @endcan
          @role('superadmin')
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('task.index')}}" class="nav-link {{ Request::segment(1) === 'task' ? 'active' : '' }}">
                <i class="fa fa-archive nav-icon"></i>
                <p>Task</p>
              </a>
            </li>
          </ul>
          @endrole
        </li>
        @endcan

        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fa fa-power-off"></i>
            <p>
              Keluar
              <!-- <span class="right badge badge-danger">New</span> -->
            </p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>