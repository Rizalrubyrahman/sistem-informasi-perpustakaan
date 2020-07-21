@extends('layouts.app')
@section('title','Export Laporan Buku')
@section('namePage','Export Laporan Buku')
@section('content1')
@endsection
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Laporan Buku</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
                <a href="/laporan/buku/pdf" class="btn btn-danger">Export Pdf</a>
            </div>
            <div class="col-md-2">
                <a href="" class="btn btn-success">Export Exel</a>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection