<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = 
    [
        'nama',
        'alamat',
        'kelas',
        'jurusan',
        'jenis_kelamin',
    ];
    protected $table = 'anggota';
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
