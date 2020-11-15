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
    <div class="card">
      <div class="table-responsive shadow mt-4">
         <div class="d-flex justify-content-end">
            <form action="/transaksi" method="GET">
              <input type="text" name="cari" id="cari"  style="margin-left: -260px; height:30px; width:250px;" placeholder="Masukan kode transaksi">
              <button type="submit" class="btn btn-primary btn-sm mt--2" style="height:35px; border-radius:0px;">Cari</button>
            </form>
          </div>   
          <table class="table align-items-center table-flush mt-4" id="datatable">
            <thead class="thead-light">
              <tr>
                <th scope="col">Kode Transaksi</th>
                <th scope="col">Nama Anggota</th>
                <th scope="col">Judul Buku</th>
                <th scope="col">Tanggal Pinjam</th>
                <th scope="col">Tanggal Kembali</th>
                <th class="text-center">Denda</th>
                <th scope="col">Status</th>
                @if (auth()->user()->level == "Admin")
                  <th scope="col">Aksi</th>    
                @endif
              </tr>
            </thead>
            @foreach($data_transaksi as $transaksi)
            <tbody class="list">
              <tr>
                  <td>{{$transaksi->kode_transaksi}}</td>
                  <td>{{$transaksi->anggota->nama}}</td>
                  <td>{{$transaksi->buku->judul}}</td>
                  <td>{{date('d-m-Y',strtotime($transaksi->tanggal_pinjam))}}</td>
                  <td>{{date('d-m-Y',strtotime($transaksi->tanggal_kembali))}}</td>
                  @php
                      $datetime = strtotime($transaksi->tanggal_kembali);
                      $datenow = strtotime(date("Y-m-d"));
                      $durasi = ($datetime - $datenow) / 86400;
                  @endphp
                  <td class="text-center">
                    @if ($transaksi->status == "Pinjam")
                      @if ($durasi < 0)
                        @php
                          $denda = abs($durasi) * 1000;
                        @endphp
                        Rp.{{ number_format($denda, '0', ',', '.') }}
                      @else
                        Rp.0
                      @endif
                    @else
                      Rp.0
                    @endif
                  </td>
                  <td>
                    <span class="badge" style="background-color: #ffc107; color: #212529;">{{$transaksi->status}}</span>
                  </td>
                  @if (auth()->user()->level == "Admin")
                    <td>
                      @if($transaksi->status == "Kembali")
                        <a href="#" class="btn btn-sm btn-danger delete" transaksi-id="{{ $transaksi->id }}" style="border:none;">Hapus</a>
                      @else
                        <div class="btn-group dropdown">
                          <button type="button" class="btn btn-sm btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Aksi
                          </button>
                          <div class="dropdown-menu">
                              <form action="/transaksi/{{$transaksi->id}}/ubah" method="post">
                                  {{ csrf_field() }}
                                  <input type="hidden" name="_method" value="put">
                                  <button type="submit" class="dropdown-item" style="border:none;">Sudah Kembali</button>
                              </form>
                                <a href="#" class="dropdown-item delete" transaksi-id="{{ $transaksi->id }}" style="border:none;">Hapus</a>
                          </div>
                        </div>
                      @endif
                    </td>  
                  @endif
              </tr>
            </tbody>
            @endforeach
          </table>
        </div>
      </div>
  </div>
@endsection

