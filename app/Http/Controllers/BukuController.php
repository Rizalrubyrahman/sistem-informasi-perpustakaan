<?php

namespace App\Http\Controllers;
use App\Buku;
use Illuminate\Http\Request;
use App\Http\Requests\FormBukuRequest;
use RealRashid\SweetAlert\Facades\Alert;

class BukuController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_buku = Buku::where('judul','like',"%".$request->cari."%")->get();
        }else{
            $data_buku = Buku::orderBy('kode_buku', 'ASC')->paginate(10);
        }
        return view('buku.index',compact('data_buku'));
    }
    public function tambah()
    {
        //mengurutkan data dari yang terbesar dan ambil data
        $get_row = Buku::orderBy('id','DESC')->get();
        //jumlah data yang di ambil
        $row_count = $get_row->count();
        //ambil angka terakhir dari id
        $lastId = $get_row->first();
        $kode = "BK00001";
        
        if($row_count > 0){
            if($lastId->id < 9){
                $kode = "BK0000".''.($lastId->id + 1);
            }else if($lastId->id < 99){
                $kode = "BK000".''.($lastId->id + 1);
            }else if($lastId->id < 999){
                $kode = "BK00".''.($lastId->id + 1);
            }else if($lastId->id < 9999){
                $kode = "BK0".''.($lastId->id  + 1);
            }else{
                $kode = "BK".''.($lastId->id + 1);
            }
        }

        return view('buku.tambah',compact('kode'));
    }
    public function prosesTambah(FormBukuRequest $request)
    {
        Buku::create($request->all());
        Alert::success('Berhasil','Data Telah Ditambahkan');
        return redirect('/buku');
    }
    public function ubah($id)
    {
        $buku = Buku::find($id);
        return view('buku.ubah',compact('buku'));
    }
    public function prosesUbah(FormBukuRequest $request,$id)
    {
        $buku = Buku::find($id);
        $buku->update($request->all());
        Alert::success('Berhasil','Data Telah Diubah');
        return redirect('/buku');
    }
    public function hapus($id)
    {
        Buku::destroy($id);
        Alert::success('Berhasil','Data Telah Dihapus');
        return redirect('/buku');
    }

}
