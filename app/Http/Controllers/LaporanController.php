<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function transaksi()
    {
        return view('laporan.transaksi');
    }
}
