@extends('layouts.app')
@section('title','Index Anggota')
@section('namePage','Data Anggota')
@section('content1')
@if (auth()->user()->level == "Admin")
    <a href="/anggota/tambah" class="btn btn-sm btn-neutral"><i class="ni ni-fat-add mt-1"></i>Tambah Data</a>
@endif   
@endsection
@section('content')

<div class="card">
<div class="table-responsive shadow mt-4">
    <table class="table align-items-center table-flush" id="datatable">
      <thead class="thead-light">
        <tr>
          <th scope="col">Nama Anggota</th>
          <th scope="col">Alamat</th>
          <th scope="col">Kelas</th>
          <th scope="col">Jurusan</th>
          <th scope="col">Jenis Kelamin</th>
          @if(auth()->user()->level == "Admin")
            <th scope="col">Aksi</th>    
          @endif
        </tr>
      </thead>
      @foreach($data_anggota as $anggota)
      <tbody class="list">
        <tr>
            <td>{{$anggota->nama}}</td>
            <td>{{$anggota->alamat}}</td>
            <td>{{$anggota->kelas}}</td>
            <td>{{$anggota->jurusan}}</td>
            <td>{{$anggota->jenis_kelamin}}</td>
            @if (auth()->user()->level == "Admin")
              <td>
                <a href="/anggota/{{$anggota->id}}/ubah" class="btn btn-sm btn-warning">Ubah</a>
                <a href="#" class="btn btn-sm btn-danger delete" anggota-id="{{ $anggota->id }}" style="border:none;">Hapus</a>
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
        var anggota_id = $(this).attr('anggota-id');
        swal({
          title: "Apa kamu yakin?",
          text: "Data akan dihapus",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            window.location = "/anggota/" + anggota_id + "/hapus";
          }
        });
      });
    </script>
@endsection