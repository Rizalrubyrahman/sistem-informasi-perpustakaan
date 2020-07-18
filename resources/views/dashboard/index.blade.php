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
        <h3>Buku Yang sedang Di Pinjam</h3>
      </div>
    <div class="card-body" >
      <div class="table-responsive shadow mt-4">
    <table class="table align-items-center table-flush" id="datatable">
      <thead class="thead-light">
        <tr>
          <th scope="col">Kode Transaksi</th>
          <th scope="col">Nama Anggota</th>
          <th scope="col">Judul Buku</th>
          <th scope="col">Tanggal Pinjam</th>
          <th scope="col">Tanggal Kembali</th>
          <th scope="col">Status</th>
          @if (auth()->user()->level == "Admin")
            <th scope="col">Aksi</th>    
          @endif
        </tr>
      </thead>
      
      @foreach($data_transaksi as $transaksi)
      @if ($transaksi->status == "Pinjam")
      <tbody class="list">
        <tr>
            <td>{{$transaksi->kode_transaksi}}</td>
            <td>{{$transaksi->anggota->nama}}</td>
            <td>{{$transaksi->buku->judul}}</td>
            <td>{{date('d-m-yy',strtotime($transaksi->tanggal_pinjam))}}</td>
            <td>{{date('d-m-yy',strtotime($transaksi->tanggal_kembali))}}</td>
            <td>
                @if($transaksi->status == "Pinjam")
                    <span class="badge" style="background-color: #ffc107; color: #212529;">{{$transaksi->status}}</span>
                @else
                    <span class="badge" style="background-color: #28a745; color:#fff">{{$transaksi->status}}</span>
                @endif
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
      @endif
      @endforeach
      
    </table>
  </div>
    </div>
    </div>
  </div>
@endsection
@section('javascript')
    <script>
      $('.delete').click(function(){
        var transaksi_id = $(this).attr('transaksi-id');
        swal({
          title: "Apa kamu yakin?",
          text: "Data akan dihapus",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location = "/transaksi/" + transaksi_id + "/hapus";
          }
        });
      });
    </script>
@endsection