@extends('layouts.app')
@section('title','Tambah Data Anggota')
@section('namePage','Tambah Data Anggota')
@section('content')
<div class="card py-4 shadow">
    <div class="container">
        <form action="/anggota/proses-tambah" method="post">
            {{ csrf_field() }}
            <div class="form-group mt-2">
                <label for="nama">Nama Anggota</label>
                <input type="text" name="nama" id="nama" class="form-control {{$errors->has('nama') ? 'is-invalid' : '' }}" placeholder="Masukan Nama Anggota" value="{{old('nama')}}">
                {!!$errors->first('nama','<span class=" invalid-feedback">:message</span>' )!!}
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select name="kelas" id="kelas" class="form-control {{$errors->has('kelas') ? 'is-invalid' : ''}}">
                            <option value="X" @if(old('kelas') == 'X') selected @endif>X</option>
                            <option value="XI" @if(old('kelas') == 'XI') selected @endif>XI</option>
                            <option value="XII" @if(old('kelas') == 'XII') selected @endif>XII</option>
                        </select>
                        {!!$errors->first('kelas','<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jurusan">jurusan</label>
                        <select name="jurusan" id="jurusan" class="form-control {{$errors->has('jurusan') ? 'is-invalid' : ''}}">
                            <option value="TKJ" @if(old('jurusan') == 'TKJ') selected @endif>TKJ</option>
                            <option value="TKR" @if(old('jurusan') == 'TKR') selected @endif>TKR</option>
                            <option value="AP" @if(old('jurusan') == 'AP') selected @endif>AP</option>
                            <option value="TPHP" @if(old('jurusan') == 'TPHP') selected @endif>TPHP</option>
                        </select>
                        {!!$errors->first('jurusan','<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
            <div class="form-check mt-3">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios1" value="Laki-Laki" @if(old('jenis_kelamin') == 'Laki-Laki') checked @endif>
                <label class="form-check-label" for="exampleRadios1">Laki-Laki</label>

                <input class="form-check-input ml-2" type="radio" name="jenis_kelamin" id="exampleRadios1" value="Perempuan" @if(old('jenis_kelamin') == 'Perempuan') checked @endif>
                <label class="form-check-label ml-4" for="exampleRadios1">Perempuan</label>
            </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control {{$errors->has('alamat') ? 'is-invalid' : ''}}" rows="5" placeholder="Masukan Alamat" value="{{old('alamat')}}"></textarea>
                {!!$errors->first('alamat','<span class="invalid-feedback">:message</span>')!!}
            </div>
            <button type="submit" class="btn btn-primary"><i class="ni ni-send"></i> Simpan</button>
        </form>
    </div>
</div>
@endsection