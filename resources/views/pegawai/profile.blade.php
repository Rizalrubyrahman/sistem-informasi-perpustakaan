@extends('layouts.app')
@section('title','Profile Pegawai')
@section('namePage','Profile Pegawai')
@section('content')
    
<div class="container-fluid">
    <div class="row">
      <div class="col-xl-4 order-xl-2">
        
        <div class="card card-profile">
          <img src="{{asset('assets/img/theme/img-1-1000x600.jpg')}}" alt="Image placeholder" class="card-img-top">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">
                <a href="#">
                  <img src="{{$pegawai->getFoto()}}" class="rounded-circle" style="height: 140px; width:160px;">
                </a>
              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
          
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col">
                
              </div>
            </div>
            <div class="text-center mt-4">
              <h5 class="h3">
                {{$pegawai->nama}}<span class="font-weight-light"></span>
              </h5>
              <div class="h5 font-weight-300">
                <i class="ni location_pin mr-2"></i>{{$pegawai->jenis_kelamin}}
              </div>
              <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>Alamat : <i class="ni location_pin mr-2"></i>{{$pegawai->alamat}}
              </div>
              <div class="h5 mt-4>
                <i class="ni business_briefcase-24 mr-2"></i>No Hp : <i class="ni location_pin mr-2"></i>{{$pegawai->no_hp}}
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 order-xl-1">
     

        <div class="card">
          <div class="card-header">
            <div class="row align-items-center"> 
              <h3>Edit Profile</h3>
            </div>
          </div>
        <div class="card-body ">
          <div class="pl-lg-2">
            <form action="/pegawai/{{$pegawai->id}}/profile/ubah" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <div class="form-group">
                <label for="kode_pegawai">Kode Pegawai</label>
                <input type="text" name="kode_pegawai" id="kode_pegawai" class="form-control {{$errors->has('kode_pegawai') ? 'is-invalid' : ''}}" value="{{$pegawai->kode_pegawai}}" readonly>
                {!!$errors->first('kode_pegawai','<span class="invalid-feedback">:message</span>')!!}
            </div>
            <div class="form-group">
                <label for="nama">Nama Pegawai</label>
                <input type="text" name="nama" id="nama" class="form-control {{$errors->has('nama') ? 'is-invalid' : ''}}" value="{{$pegawai->nama}}">
                {!!$errors->first('nama','<span class="invalid-feedback">:message</span>')!!}
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <div class="form-check mt-3">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="exampleRadios1" value="Laki-Laki" {{($pegawai->jenis_kelamin == 'Laki-Laki') ? 'checked' : ''}}>
                    <label class="form-check-label" for="exampleRadios1">Laki-Laki</label>

                    <input class="form-check-input ml-2" type="radio" name="jenis_kelamin" id="exampleRadios1" value="Perempuan" {{($pegawai->jenis_kelamin == 'Perempuan') ? 'checked' : ''}}>
                    <label class="form-check-label ml-4" for="exampleRadios1">Perempuan</label>
                </div>
            </div>
            <div class="form-group">
                <label for="no_hp">No Hp</label>
                <input type="text" name="no_hp" id="no_hp" class="form-control {{$errors->has('no_hp') ? 'is-invalid' : ''}}" value="{{$pegawai->no_hp}}">
                {!!$errors->first('no_hp','<span class="invalid-feedback">:message</span>')!!}
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" id="alamat" rows="5" class="form-control {{$errors->has('alamat') ? 'is-invalid' : ''}}">{{$pegawai->alamat}}</textarea>
                {!!$errors->first('alamat','<span class="invalid-feedback">:message</span>')!!}
            </div>
            <div class="form-group">
                <label for="foto">Foto Profile</label>
                <input type="file" name="foto" id="foto" class="form-control {{$errors->has('foto') ? 'is-invalid' : ''}}" value="{{$pegawai->getFoto()}}" /> 
                {!!$errors->first('foto','<span class="invalid-feedback">:message</span>')!!}
            </div>
            <div class="form-group">
              <label>Level</label>
              <select name="level" class="form-control">
                  <option value="Admin" {{($pegawai->user->level == "Admin") ? 'selected' : ''}}>Admin</option>
                  <option value="Guru" {{($pegawai->user->level == "Guru") ? 'selected' : ''}}>Guru</option>
              </select>
          </div>
            <button type="submit" class="btn btn-warning"><i class="ni ni-send"></i> Ubah</button>
            </form>
          </div>
        </div>
        
@endsection

