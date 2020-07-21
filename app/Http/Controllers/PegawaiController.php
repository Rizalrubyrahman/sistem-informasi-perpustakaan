<?php

namespace App\Http\Controllers;
use App\Pegawai;
use App\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\ErrorRequest;
use App\Http\Requests\EditRequest;
use File;


class PegawaiController extends Controller
{
    public function index()
    {
        $data_pegawai = Pegawai::all()->sortBy('kode_pegawai');
        return view('pegawai.index',compact('data_pegawai'));
    }

    public function tambah()
    {
        $get_row = Pegawai::orderBy('id','DESC')->get();
        $row_count = $get_row->count();
        $lastId = $get_row->first();
        $kode = "PG00001";
        if($row_count > 0){
            if($lastId->id < 9){
                $kode = "PG0000".''.($lastId->id + 1);
            }else if($lastId->id < 99){
                $kode = "PG000".''.($lastId->id + 1);
            }else if($lastId->id < 999){
                $kode = "PG00".''.($lastId->id + 1);
            }else if($lastId->id <9999){
                $kode = "PG0".''.($lastId->id + 1);
            }else{
                $kode = "PG".''.($lastId->id + 1);
            }
        }
        return view('pegawai.tambah',compact('kode'));
    }
    public function prosesTambah(ErrorRequest $request)
    {
        if($request->hasFile('foto'))
        {
            //input user
            $user = new User;
            $user->name = $request->nama;
            $user->email = $request->email;
            $user->username = $request->username;
            $user->password = bcrypt($request->password);
            $user->remember_token = str_random(50);
            $user->level = $request->level;
            $user->save();
            //input pegawai
            $request->request->add(['user_id' => $user->id]);
            $pegawai = Pegawai::create($request->all());
            $tempat_file = public_path('/images');
            $request->file('foto')->move($tempat_file,$request->file('foto')->getClientOriginalName());
            $pegawai->foto = $request->file('foto')->getClientOriginalName();
            $pegawai->save();
        }
        
        Alert::success('Berhasil','Data Telah Ditambahkan');
        return redirect('/pegawai');
        
    }
    public function profile($id)
    {
        $pegawai = Pegawai::find($id);
        return view('pegawai.profile',compact('pegawai'));
    }
    public function hapus($id)
    {
        $pegawai = Pegawai::where('id',$id)->first();
        File::delete('images/'.$pegawai->foto);
        $pegawai->delete();
        $pegawai->user()->delete();
        Alert::success('Berhasil','Data Telah Dihapus'); 
        return redirect('/pegawai'); 
    }
    public function ubah(EditRequest $request,$id)
    {
        $pegawai = Pegawai::find($id);
        
        $pegawai->user()->update([
            'name' => $request->nama,
            'level' => $request->level,
        ]);
        $pegawai->update($request->all());
        if($request->hasFile('foto'))
        {
            $tempat_file = public_path('/images');
            $request->file('foto')->move($tempat_file,$request->file('foto')->getClientOriginalName());
            $pegawai->foto = $request->file('foto')->getClientOriginalName();
            $pegawai->save();
        }
        Alert::success('Berhasil','Data Telah Diubah');
        return redirect('pegawai/'.$id.'/profile');
    }
}
