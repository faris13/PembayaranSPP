 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('admin/home')}}" class="brand-link">
      <img src="{{asset('pic/smkn4.png') }}" alt="SMKN 4 Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Pembayaran SPP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{url('admin/home')}}" class="nav-link {{Request::is ('admin/home') ? 'active' : '' }}">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{url('admin/crud/siswa')}}" class="nav-link {{Request::is ('admin/crud/siswa','admin/tambah/siswa') ? 'active' : '' }}">
              <i class="nav-icon fas fa-graduation-cap"></i>
              <p>
                Manage Data Siswa
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{url('admin/crud/petugas')}}" class="nav-link {{Request::is ('admin/crud/petugas','admin/tambah/petugas') ? 'active' : '' }}">
             <i class="nav-icon fas fa-user-circle"></i>
              <p>
                Manage Data Petugas
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{url('admin/crud/kelas')}}" class="nav-link {{Request::is ('admin/crud/kelas','admin/tambah/kelas') ? 'active' : '' }}">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Manage Data Kelas
              </p>
            </a>
          </li>
          <li class="nav-item ">
            <a href="{{url('admin/crud/spp')}}" class="nav-link {{Request::is ('admin/crud/spp','admin/tambah/spp') ? 'active' : '' }}">
             <i class="nav-icon fas fa-tasks"></i>
              <p>
                Manage Data SPP
              </p>
            </a>
          </li><li class="nav-item ">
            <a href="{{url('admin/crud/pembayaran')}}" class="nav-link {{Request::is ('admin/crud/pembayaran','admin/tambah/pembayaran') ? 'active' : '' }}">
             <i class="nav-icon fas fa-credit-card"></i>
              <p>
                Manage Data Pembayaran
              </p>
            </a>
          </li><li class="nav-item ">
            <a href="{{url('logout')}}" class="nav-link {{Request::is ('logout') ? 'active' : '' }}">
             <i class="nav-icon fas fa-arrow-left" aria-hidden="true"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>