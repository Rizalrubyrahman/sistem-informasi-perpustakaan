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
    public function index(Request $request)
    {
        $pegawai = Pegawai::all();
        $buku = Buku::all();
        $anggota = Anggota::all();
        if($request->has('cari')){
            $data_transaksi = Transaksi::where('kode_transaksi','like',"%".$request->cari."%")->get();
        }else{
            $data_transaksi = Transaksi::where('status', 'Pinjam')->orderBy('kode_transaksi', 'ASC')->paginate(10);
        }
        

        return view('dashboard.index',compact('pegawai','anggota','buku','data_transaksi'));
    }
}
