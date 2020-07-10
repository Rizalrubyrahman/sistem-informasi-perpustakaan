@extends('layouts.app')
@section('title','Tambah Transaksi')
@section('namePage','Tambah Transaksi')
@section('content')
<div class="card py-4 shadow">
    <div class="container">
        <form action="/transaksi/proses-tambah" method="post">
            {{ csrf_field() }}
            <div class="form-group mt-2">
                <label for="kode_transaksi">Kode Transaksi</label>
                <input type="text" name="kode_transaksi" id="kode_transaksi" class="form-control {{$errors->has('kode_transaksi') ? 'is-invalid' : '' }}" placeholder="Masukan ID pegawai" value="{{$kode}}" readonly>
                
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-10">
                        <label for="anggota_id">Nama Anggota</label>
                        <input type="text" id="anggota_nama" class="form-control" readonly>
                        <input type="hidden" name="anggota_id" id="anggota_id" class="form-control" value="{{old('anggota_id')}}">  
                    </div>
                    <div class="col-md-2">    
                        <button type="button" class="btn btn-primary" style="margin-top:33px;" data-toggle="modal" data-target="#modal1">
                            Cari Anggota
                        </button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="col-md-10">
                        <label>Judul Buku</label>
                        <input type="text" id="buku_judul" class="form-control" readonly>
                        <input type="hidden" name="buku_id" id="buku_id" class="form-control" value="{{old('buku_id')}}">
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-primary" style="margin-top:33px;" data-toggle="modal" data-target="#modal2">
                            Cari Buku
                        </button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="tanggal_pinjam">Tanggal Pinjam</label>
                <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control {{$errors->has('tanggal_pinjam') ? 'is-invalid' : ''}}" value="{{date('d-m-yy',strtotime(Carbon\Carbon::toDay()->toDateString()))}} ">
                {!!$errors->first('tanggal_pinjam','<span class="invalid-feedback">:message</span>')!!}
            </div>
            <div class="form-group">
                <label for="tanggal_kembali">Tanggal Kembali</label>
                <input type="date" name="tanggal_kembali" id="tanggal_kembali" class="form-control {{$errors->has('tanggal_kembali') ? 'is-invalid' : ''}}" value="{{date('d-m-yy',strtotime(Carbon\Carbon::toDay()->addDays(7)->toDateString()))}}">
                {!!$errors->first('tanggal_kembali','<span class="invalid-feedback">:message</span>')!!}
            </div>
            <button type="submit" class="btn btn-primary"><i class="ni ni-send"></i> Simpan</button>
        </form>
    </div>
</div>
<!-- Modal judul buku -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 1000px; margin-left:-130px;">
        <div class="modal-header">
          <h5 class="modal-title">Cari Buku</h5>
          <button type="button"  class="close-modal" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="table-responsive shadow mt-4">
                <table class="table table-striped align-items-center table-flush" id="tabel-buku">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Judul Buku</th>
                      <th scope="col">Pengarang</th>
                      <th scope="col">Penerbit</th>
                      <th scope="col">Tahun Terbit</th>
                      <th scope="col">Jumlah</th>
                     
                    </tr>
                  </thead>
                  @foreach($data_buku as $buku)
                  <tbody class="list">
                    <tr class="pilih-buku" data-buku-id="<?php echo $buku->id; ?>" data-buku-judul="<?php echo $buku->judul; ?>">
                        <td>{{$buku->judul}}</td>
                        <td>{{$buku->pengarang}}</td>
                        <td>{{$buku->penerbit}}</td>
                        <td>{{$buku->tahun}}</td>
                        <td>{{$buku->jumlah}}</td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary close-modal" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<!-- Modal  nama anggota-->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content" style="width: 1000px; margin-left:-130px;">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cari Anggota</h5>
            <button type="button" class="close-anggota" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="table-responsive shadow mt-4">
                <table class="table table-striped align-items-center table-flush" id="tabel-anggota">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Nama Anggota</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">Kelas</th>
                      <th scope="col">Jurusan</th>
                      <th scope="col">Jenis Kelamin</th>
                     
                    </tr>
                  </thead>
                  @foreach($data_anggota as $anggota)
                  <tbody class="list">
                    <tr class="pilih-anggota" data-anggota-id="<?php echo $anggota->id; ?>" data-anggota-nama="<?php echo $anggota->nama; ?>">
                        <td>{{$anggota->nama}}</td>
                        <td>{{$anggota->alamat}}</td>
                        <td>{{$anggota->kelas}}</td>
                        <td>{{$anggota->jurusan}}</td>
                        <td>{{$anggota->jenis_kelamin}}</td>
                    </tr>
                  </tbody>
                  @endforeach
                </table>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>  
        </div>
      </div>
    </div>
  </div>
@endsection
@section('javascript')
    <script>
        $(document).on('click','.pilih-anggota',function(e){
            document.getElementById('anggota_nama').value = $(this).attr('data-anggota-nama');
            document.getElementById('anggota_id').value = $(this).attr('data-anggota-id');
            $('.close-anggota').click();
        });
        $(document).on('click','.pilih-buku', function(e){
            document.getElementById('buku_judul').value = $(this).attr('data-buku-judul');
            document.getElementById('buku_id').value = $(this).attr('data-buku-id');        
            $('.close-modal').click();

        });
        $(document).ready( function () {
            $('#tabel-anggota').DataTable();
        });
        $(document).ready( function () {
            $('#tabel-buku').DataTable();
        });
    </script>
@endsection