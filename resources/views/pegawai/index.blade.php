@extends('layouts.app')
@section('title','Index Pegawai')
@section('namePage','Data Pegawai')
@section('content1')
@if (auth()->user()->level == "Admin")
    <a href="/pegawai/tambah" class="btn btn-sm btn-neutral"><i class="ni ni-fat-add mt-1"></i> Tambah Data</a>
@endif
@endsection
@section('content')

<div class="card">
<div class="table-responsive shadow mt-4">
    <table class="table align-items-center table-flush" id="datatable">
      <thead class="thead-light">
        <tr>
          <th scope="col">Kode Pegawai</th>
          <th scope="col">Nama Pegawai</th>
          <th scope="col">Jenis Kelamin</th>
          <th scope="col">No Hp</th>
          <th scope="col">Alamat</th>
          <th scope="col">Level</th>
          @if (auth()->user()->level == "Admin")
            <th scope="col">Aksi</th>    
          @endif
        </tr>
      </thead>
      @foreach($data_pegawai as $pegawai)
      <tbody class="list">
        <tr>
            <td>{{$pegawai->kode_pegawai}}</td>
            <td>
              @if (auth()->user()->level == "Admin")
                <a href="/pegawai/{{$pegawai->id}}/profile">{{$pegawai->nama}}</a>
              @else
                {{$pegawai->nama}}
              @endif
            </td>
            <td>{{$pegawai->jenis_kelamin}}</td>
            <td>{{$pegawai->no_hp}}</td>
            <td>{{$pegawai->alamat}}</td>
            <td>{{$pegawai->user->level}}</td>
            @if (auth()->user()->level == "Admin")
              <td>
                <form action="/pegawai/{{$pegawai->id}}/hapus" method="post">
                  {{ csrf_field() }}
                  <input type="hidden" name="_method" value="delete">
                  <button type="submit" class="btn btn-sm btn-danger" style="border:none;">Hapus</button>
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