@extends('layouts.app')
@section('title','Index Buku')
@section('namePage','Data Buku')
@section('content1')
@if (auth()->user()->level == "Admin")
    <a href="/buku/tambah" class="btn btn-sm btn-neutral"><i class="ni ni-fat-add mt-1"></i>Tambah Data</a>
@endif
@endsection    
@section('content')

<div class="card">
<div class="table-responsive shadow mt-4">
  <div class="d-flex justify-content-end">
    <form action="/buku" method="GET">
      <input type="text" name="cari" id="cari"  style="margin-left: -260px; height:30px; width:250px;" placeholder="Masukan nama buku">
      <button type="submit" class="btn btn-primary btn-sm mt--2" style="height:35px; border-radius:0px;">Cari</button>
    </form>
  </div>
    <table class="table align-items-center table-flush mt-4" id="datatable">
      <thead class="thead-light">
        <tr>
          <th scope="col">Kode Buku</th>
          <th scope="col">Judul Buku</th>
          <th scope="col">Pengarang</th>
          <th scope="col">Penerbit</th>
          <th scope="col">Tahun</th>
          <th scope="col">Jumlah</th>
          @if (auth()->user()->level == "Admin")
            <th scope="col">Aksi</th>  
          @endif
        </tr>
      </thead>
      @foreach($data_buku as $buku)
      <tbody class="list">
        <tr>
            <td>{{$buku->kode_buku}}</td>
            <td>{{$buku->judul}}</td>
            <td>{{$buku->pengarang}}</td>
            <td>{{$buku->penerbit}}</td>
            <td>{{$buku->tahun}}</td>
            <td>{{$buku->jumlah}}</td>
            @if (auth()->user()->level == "Admin")
              <td>
                <a href="/buku/{{$buku->id}}/ubah" class="btn btn-sm btn-warning">Ubah</a>
                <a href="#" class="btn btn-sm btn-danger delete" buku-id="{{ $buku->id }}" style="border:none;"> Hapus</a>
              </td> 
            @endif 
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>
</div>
@endsection
@section('javascript')
    <script>
      $('.delete').click(function(){
        var buku_id = $(this).attr('buku-id');
        swal({
          title: "Apa kamu yakin?",
          text: "Data akan dihapus",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location = "/buku/" + buku_id + "/hapus";
          }
        });
      });
    </script>
@endsection