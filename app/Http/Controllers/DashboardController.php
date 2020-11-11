<?php

namespace App\Http\Controllers;
use App\Pegawai;
use App\Buku;
use App\Anggota;
use App\Transaksi;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pegawai = Pegawai::all();
        $buku = Buku::all();
        $anggota = Anggota::all();
        $data_transaksi = Transaksi::all();

        return view('dashboard.index',compact('pegawai','anggota','buku','data_transaksi'));
    }
}
