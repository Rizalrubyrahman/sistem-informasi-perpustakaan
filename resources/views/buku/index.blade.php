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
    <table class="table align-items-center table-flush" id="datatable">
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
                <form action="/buku/{{$buku->id}}/hapus" method="post" class="d-inline">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="delete">
                  <button type="submit" class="btn btn-sm btn-danger" style="border:none;"> Hapus</button>
                </form>
              </td> 
            @endif 
        </tr>
      </tbody>
      @endforeach
    </table>
  </div>
</div>
@endsection