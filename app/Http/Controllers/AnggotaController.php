<?php

namespace App\Http\Controllers;
use App\Anggota;
use Illuminate\Http\Request;
use App\Http\Requests\FormAnggotaRequest;
use RealRashid\SweetAlert\Facades\Alert;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_anggota = anggota::where('nama','like',"%".$request->cari."%")->get();
        }else{
            $data_anggota = Anggota::all();
        }
        
        return view('anggota.index',compact('data_anggota'));
    }
    public function tambah()
    {
        return view('anggota.tambah');
    }
    public function prosesTambah(FormAnggotaRequest $request)
    {
        Anggota::create($request->all());
        Alert::success('Berhasil','Data Telah Ditambahkan');
        return redirect('/anggota');
    }
    public function ubah($id)
    {
        $anggota = Anggota::find($id);
        return view('anggota.ubah',compact('anggota'));
    }
    public function prosesUbah(FormAnggotaRequest $request,$id)
    {
        $anggota = Anggota::find($id);
        $anggota->update($request->all());
        Alert::success('Berhasil','Data Telah Diubah');
        return redirect('/anggota');
    }
    public function hapus($id)
    {
        Anggota::destroy($id);
        Alert::success('Berhasil','Data Telah Dihapus');
        return redirect('/anggota');
    }
   
}
