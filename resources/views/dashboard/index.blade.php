@extends('layouts.app')
@section('title','Dashboard')
@section('namePage','Dashboard')
@section('content')
    <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Anggota</h5>
                      <span class="h2 font-weight-bold mb-0">{{$anggota->count()}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-badge"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <i class="ni ni-badge"></i><span class="text-nowrap ml-2">Jumlah Anggota</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0" style="font-size:12px;">Sedang Dipinjam</h5>
                    <span class="h2 font-weight-bold mb-0">{{$data_transaksi->where('status','Pinjam')->count()}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-single-copy-04"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <i class="ni ni-calendar-grid-58"></i>
                    <span class="text-nowrap ml-2">Sedang dipinjam</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Buku</h5>
                      <span class="h2 font-weight-bold mb-0">{{$buku->count()}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-book-bookmark"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <i class="ni ni-book-bookmark"></i>
                    <span class="text-nowrap ml-2">Jumlah buku</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Pegawai</h5>
                      <span class="h2 font-weight-bold mb-0">{{$pegawai->count()}}</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-single-02"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <i class="ni ni-single-02"></i>
                    <span class="text-nowrap">Jumlah Pegawai</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  <div class="container">
    <div class="card"style="width: 97%; margin:auto;">
      <div class="card-header">
        <h3>Grafik Peminjaman Buku Per Bulan</h3>
      </div>
      <div class="card-body" >
        <div class="row">
          <div class="col-md-12">
            <div id="map"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('javascript')
    <script>
      var map = L.map('map', {
            center: [-6.991576, 109.122923],
            zoom: 13
        });

        L.tileLayer('https://api.maptiler.com/maps/streets/{z}/{x}/{y}.png?key=Ts9g8McLuNVEfjGFTHeG', {
            attribution: '<a href="https://www.maptiler.com/copyright/" target="_blank">© MapTiler</a> <a href="https://www.openstreetmap.org/copyright" target="_blank">© OpenStreetMap contributors</a>'
        }).addTo(map);
    </script>
@endsection
