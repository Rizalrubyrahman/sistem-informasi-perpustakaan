<?php

namespace App\Http\Controllers;
use App\Buku;
use App\Anggota;
use App\Transaksi;
use Illuminate\Http\Request;
use App\Http\Requests\TransaksiRequest;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_transaksi = Transaksi::where('kode_transaksi','like',"%".$request->cari."%")->get();
        }else{
            $data_transaksi = Transaksi::all();
        }
       
       return view('transaksi.index',compact('data_transaksi'));
    }
    public function tambah()
    {
        $data_buku = Buku::where('jumlah','>', 0)->get();
        $data_anggota = Anggota::get();
        $get_row = Transaksi::orderBy('id','DESC')->get();
        $row_count = $get_row->count();
        $lastId = $get_row->first();
        $kode = "TR00001";
        if($row_count > 0)
        {
            if($lastId->id <9){
                $kode = "TR0000".''.($lastId->id + 1);
            }else if($lastId->id < 99){
                $kode = "TR000".''.($lastId->id + 1);
            }else if($lastId->id < 999){
                $kode = "TR00".''.($lastId->id + 1);
            }else if($lastId->id < 9999){
                $kode = "TR0".''.($lastId->id + 1);
            }else{
                $kode = "TR".''.($lastId->id + 1);
            }
        }
        $carbon = Carbon::now();
        
        return view('transaksi.tambah',compact('kode','data_buku','data_anggota','carbon'));
    }
    public function prosesTambah(TransaksiRequest $request)
    {
        $transaksi = Transaksi::create([
            'kode_transaksi' => $request->kode_transaksi,
            'anggota_id' => $request->anggota_id,
            'buku_id' => $request->buku_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'Pinjam'
        ]);
        //kurangi jumlah buku
        $transaksi->buku->where('id',$transaksi->buku_id)
                        ->update([
                            'jumlah' => ($transaksi->buku->jumlah - 1),
                        ]);
        Alert::success('Berhasil','Data Telah Ditambahkan');
        return redirect('/transaksi');
    }
    public function ubah($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->update([
            'status' => 'Kembali'
        ]);
        $transaksi->buku->where('id',$transaksi->buku_id)
                        ->update([
                            'jumlah' => ($transaksi->buku->jumlah + 1),
                        ]);
        Alert::success('Berhasil','Data Telah Di Ubah');
        return redirect('/transaksi');

    }
    public function hapus($id)
    {
        $transaksi = Transaksi::find($id)->delete();
        Alert::success('Berhasil','Data Telah Di Hapus');
        return redirect('/transaksi');
    }
}
