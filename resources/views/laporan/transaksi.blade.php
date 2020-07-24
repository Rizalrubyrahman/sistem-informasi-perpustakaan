@extends('layouts.app')
@section('title','Export Laporan Transaksi')
@section('namePage','Export Laporan Transaksi')
@section('content1')
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Laporan Transaksi</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <div class="dropdown">
                    <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Export PDF
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="/laporan/transaksi/pdf">Semua Transaksi</a>
                      <a class="dropdown-item" href="/laporan/transaksi/pdf?status=Pinjam">Tabel Pinjam</a>
                      <a class="dropdown-item" href="/laporan/transaksi/pdf?status=Kembali">Tabel Kembali</a>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection