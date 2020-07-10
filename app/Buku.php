<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $table = 'buku';
    protected $fillable = [
        'kode_buku',
        'judul',
        'pengarang',
        'penerbit',
        'tahun',
        'jumlah'
    ];
    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
