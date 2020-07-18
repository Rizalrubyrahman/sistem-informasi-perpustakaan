@extends('layouts.app')
@section('title','Tambah Data Pegawai')
@section('namePage','Tambah Data Pegawai')
@section('content')
<div class="card py-4 shadow">
    <div class="container">
        <form action="/pegawai/proses-tambah" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group mt-2">
                <label for="kode_pegawai">Kode Pegawai</label>
                <input type="text" name="kode_pegawai" id="kode_pegawai" class="form-control {{$errors->has('kode_pegawai') ? 'is-invalid' : '' }}" placeholder="Masukan ID pegawai" value="{{$kode}}" readonly>
                {!!$errors->first('kode_pegawai','<span class=" invalid-feedback">:message</span>' )!!}
            </div>
            <div class="form-group">
                <label for="nama">Nama Pegawai</label>
                <input type="text" name="nama" id="nama" class="form-control {{$errors->has('nama') ? 'is-invalid' : ''}}" placeholder="Masukan nama pegawai" value="{{old('nama')}}">
                {!!$errors->first('nama','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                    <div class="form-check mt-3">
                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios1" value="Laki-Laki">
                        <label class="form-check-label" for="exampleRadios1">Laki-Laki</label>

                        <input class="form-check-input ml-2" type="radio" name="jenis_kelamin" id="exampleRadios1" value="Perempuan">
                        <label class="form-check-label ml-4" for="exampleRadios1">Perempuan</label>
                    </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="no_hp">No Hp</label>
                        <input type="text" name="no_hp" id="no_hp" class="form-control {{$errors->has('no_hp') ? 'is-invalid' : ''}}" placeholder="Masukan No HP" value="{{old('no_hp')}}">
                        {!!$errors->first('no_hp','<span class="invalid-feedback">:message</span>')!!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control {{$errors->has('alamat') ? 'is-invalid' : ''}}" rows="5" placeholder="Masukan alamat">{{old('alamat')}}</textarea>
                {!!$errors->first('alamat','<span class="invalid-feedback">:message</span>')!!}
            </div>
            <div class="form-group">
                <label for="foto">Foto Profile</label>
                <input type="file" name="foto" id="foto" class="form-control {{$errors->has('foto') ? 'is-invalid' : ''}}">
                {!!$errors->first('foto','<span class="invalid-feedback">:message</span>')!!}
            </div>
            <div class="form-group">
                <label for="username">username</label>
                <input type="text" name="username" id="username" class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" placeholder="Masukan username" value="{{old('username')}}">
                {!!$errors->first('username','<span class="invalid-feedback">:message</span>')!!}
            </div>
            <div class="form-grou">
                <label for="foto">Email</label>
                <input type="email" name="email" id="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}">
                {!!$errors->first('email','<span class="invalid-feedback">:message</span>')!!}
            </div>  
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" placeholder="Masukan Password">
                {!!$errors->first('password','<span class="invalid-feedback">:message</span>')!!}
            </div>
            <div class="form-group">
                <label>Level</label>
                <select name="level" class="form-control">
                    <option value="Admin">Admin</option>
                    <option value="Guru">Guru</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary"><i class="ni ni-send"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection