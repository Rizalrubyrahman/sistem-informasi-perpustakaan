@extends('layouts.app')
@section('title','Ubah Data Anggota')
@section('namePage','Ubah Data Anggota')
@section('content')
<div class="card py-4 shadow">
    <div class="container">
        <form action="/anggota/{{$anggota->id}}/proses-ubah" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <div class="form-group mt-2">
                <label for="nama">Nama Anggota</label>
                <input type="text" name="nama" id="nama" class="form-control {{$errors->has('nama') ? 'is-invalid' : '' }}" placeholder="Masukan Nama Anggota" value="{{$anggota->nama}}">
                {!!$errors->first('nama','<span class=" invalid-feedback">:message</span>' )!!}
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select name="kelas" id="kelas" class="form-control {{$errors->has('kelas') ? 'is-invalid' : ''}}">
                            <option value="X" {{($anggota->kelas == 'X') ? 'selected' : ''}}>X</option>
                            <option value="XI" {{($anggota->kelas == 'XI') ? 'selected' : ''}}>XI</option>
                            <option value="XII" {{($anggota->kelas == 'XII') ? 'selected' : ''}}>XII</option>
                        </select>
                        {!!$errors->first('kelas','<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jurusan">jurusan</label>
                        <select name="jurusan" id="jurusan" class="form-control {{$errors->has('jurusan') ? 'is-invalid' : ''}}">
                            <option value="TKJ" {{($anggota->jurusan == 'TKJ') ? 'selected' : ''}}>TKJ</option>
                            <option value="TKR" {{($anggota->jurusan == 'TKR') ? 'selected' : ''}}>TKR</option>
                            <option value="AP" {{($anggota->jurusan == 'AP') ? 'selected' : ''}}>AP</option>
                            <option value="TPHP" {{($anggota->jurusan == 'TPHP') ? 'selected' : ''}}>TPHP</option>
                        </select>
                        {!!$errors->first('jurusan','<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
            <div class="form-check mt-3">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios1" value="Laki-Laki" {{($anggota->jenis_kelamin == 'Laki-Laki') ? 'checked' : ''}}>
                <label class="form-check-label" for="exampleRadios1">Laki-Laki</label>

                <input class="form-check-input ml-2" type="radio" name="jenis_kelamin" id="exampleRadios1" value="Perempuan" {{($anggota->jenis_kelamin == 'Perempuan') ? 'checked' : ''}}>
                <label class="form-check-label ml-4" for="exampleRadios1">Perempuan</label>
            </div>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" class="form-control {{$errors->has('alamat') ? 'is-invalid' : ''}}" rows="5" placeholder="Masukan Alamat">{{$anggota->alamat}}</textarea>
                {!!$errors->first('alamat','<span class="invalid-feedback">:message</span>')!!}
            </div>
            <button type="submit" class="btn btn-warning"><i class="ni ni-send"></i> Ubah</button>
        </form>
    </div>
</div>
@endsection