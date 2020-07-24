 <!-- Sidenav -->
 <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <img  style="margin-top:-25px;" src="{{ asset('assets/img/smk.jpg') }}">
          <h2 class="text-center mt--4">Perpus SMKN 1 Cilamaya Wetan</h2>
          <!-- Nav items -->
          <ul class="navbar-nav mt-4">
            <li class="nav-item">
              <a class="nav-link {{ Request::is('/*') ? 'active' : '' }}" href="/">
                <i class="ni ni-tv-2 text-primary"></i>
                <span class="nav-link-text">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <div class="dropdown ml-1">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="box-shadow: 3px 3px 3px white; background-color:white;">
                  <i class="ni ni-single-02"></i> 
                   <span class="nav-link-text">Pengguna</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2" style="box-shadow: 3px 3px 3px white;">
                 <ul>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('pegawai*') ? 'active' : '' }}" href="/pegawai">
                      <span class="ml--3">Data Pegawai</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('anggota*') ? 'active' : '' }}" href="/anggota">
                      <span class="ml--3">Data Anggota</span>
                    </a>
                  </li>
                 </ul>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('buku*') ? 'active' : '' }}" href="/buku">
                <i class="ni ni-book-bookmark text-default"></i>
                <span class="nav-link-text">Data Buku</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ Request::is('transaksi*') ? 'active' : '' }}" href="/transaksi">
                <i class="ni ni-curved-next text-default"></i>
                <span class="nav-link-text">Transaksi</span>
              </a>
            </li>
            <li class="nav-item">
              <div class="dropdown ml-1">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="box-shadow: 3px 3px 3px white; background-color:white;">
                  <i class="ni ni-single-copy-04"></i> 
                   <span class="nav-link-text">Laporan</span>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2" style="box-shadow: 3px 3px 3px white;">
                 <ul>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('laporan-transaksi*') ? 'active' : '' }}" href="/laporan-transaksi">
                      <span class="ml--3">Cetak Laporan Transaksi</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link {{ Request::is('laporan-buku*') ? 'active' : '' }}" href="/laporan-buku">
                      <span class="ml--3">Cetak Laporan Buku</span>
                    </a>
                  </li>
                 </ul>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>