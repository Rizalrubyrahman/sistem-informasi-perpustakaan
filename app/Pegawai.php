<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $fillable = [
        'user_id',
        'kode_pegawai',
        'nama',
        'jenis_kelamin',
        'no_hp',
        'alamat',
        'foto',
    ];
    public function getFoto()
    {
        if(!$this->foto){
            if($this->jenis_kelamin == 'Pria'){
                return asset('images/default-laki2.jpg');
            }else{
                return asset('images/default-perempuan.jpg');
            }
        }
        return asset('images/'.$this->foto);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
