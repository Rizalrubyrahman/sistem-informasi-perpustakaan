@extends('layouts.app')
@section('title','Ubah Data Buku')
@section('namePage','Ubah Data Buku')
@section('content')
<div class="card py-4 shadow">
    <div class="container">
        <form action="/buku/{{$buku->id}}/proses-ubah" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="put">
            <div class="form-group mt-2">
                <label for="kode_buku">Kode Buku</label>
                <input type="text" name="kode_buku" id="kode_buku" class="form-control {{$errors->has('kode_buku') ? 'is-invalid' : '' }}" placeholder="Masukan Kode Buku" value="{{$buku->kode_buku}}" readonly>
                {!!$errors->first('kode_buku','<span class=" invalid-feedback">:message</span>' )!!}
            </div>
            <div class="form-group">
                <label for="judul">Judul Buku</label>
                <input type="text" name="judul" id="judul" class="form-control {{$errors->has('judul') ? 'is-invalid' : ''}}" placeholder="Masukan Judul Buku" value="{{$buku->judul}}">
                {!!$errors->first('judul','<span class="invalid-feedback">:message</span>') !!}
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pengarang">Pengarang</label>
                        <input type="text" name="pengarang" id="pengarang" class="form-control {{$errors->has('pengarang') ? 'is-invalid' : ''}}" placeholder="Masukan Nama Pengarang" value="{{$buku->pengarang}}">
                        {!!$errors->first('pengarang','<span class="invalid-feedback">:message</span>') !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="penerbit">Penerbit</label>
                        <input type="text" name="penerbit" id="penerbit" class="form-control {{$errors->has('penerbit') ? 'is-invalid' : ''}}" placeholder="Masukan Nama Penerbit" value="{{$buku->penerbit}}">
                        {!!$errors->first('penerbit','<span class="invalid-feedback">:message</span>')!!}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="tahun">Tahun</label>
                <select name="tahun" id="tahun" class="form-control {{$errors->has('tahun') ? 'is-invalid' : ''}}">
                <?php
                    for($i = 1990;$i <= 2020; $i++)
                    {
                ?>
                    <option value="{{$i}}" {{{($buku->tahun == $i) ? 'selected' : ''}}}>{{$i}}</option>
                <?php 
                    }
                ?>
                </select>
                {!!$errors->first('tahun','<span class="invalid-feedback">:message</span>')!!}
            </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Buku</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control {{$errors->has('jumlah') ? 'is-invalid' : ''}}" placeholder="Masukan Jumlah Buku" value="{{$buku->jumlah}}">
                    {!!$errors->first('jumlah','<span class="invalid-feedback">:message</span>')!!}
                </div>
            <button type="submit" class="btn btn-warning"><i class="ni ni-send"></i> Ubah</button>
        </form>
    </div>
</div>
@endsection