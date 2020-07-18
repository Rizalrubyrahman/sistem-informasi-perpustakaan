<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth','cekLevel:Admin,Guru']], function () {
    //pegawai
    Route::get('/pegawai','PegawaiController@index');
    Route::get('/pegawai/tambah','PegawaiController@tambah');
    Route::post('/pegawai/proses-tambah','PegawaiController@prosesTambah');
    Route::get('/pegawai/{id}/profile','PegawaiController@profile');
    Route::get('/pegawai/{id}/hapus','PegawaiController@hapus');
    Route::put('/pegawai/{id}/profile/ubah','PegawaiController@ubah');

    //dashboard
    Route::get('/','DashboardController@index');

    //buku
    Route::get('/buku','BukuController@index');
    Route::get('/buku/tambah','BukuController@tambah');
    Route::post('/buku/proses-tambah','BukuController@prosesTambah');
    Route::get('/buku/{id}/ubah','BukuController@ubah');
    Route::put('buku/{id}/proses-ubah','BukuController@prosesUbah');
    Route::get('/buku/{id}/hapus','BukuController@hapus');

    //amggota
    Route::get('/anggota','AnggotaController@index');
    Route::get('/anggota/tambah','AnggotaController@tambah');
    Route::post('anggota/proses-tambah','AnggotaController@prosesTambah');
    Route::get('/anggota/{id}/ubah','AnggotaController@ubah');
    Route::put('/anggota/{id}/proses-ubah','AnggotaController@prosesUbah');
    Route::get('/anggota/{id}/hapus','AnggotaController@hapus');

    //transaksi
    Route::get('/transaksi','TransaksiController@index');
    Route::get('/transaksi/tambah','TransaksiController@tambah');
    Route::post('/transaksi/proses-tambah','TransaksiController@prosesTambah');
    Route::put('/transaksi/{id}/ubah','TransaksiController@ubah');
    Route::get('/transaksi/{id}/hapus','TransaksiController@hapus');

    //laporan
    Route::get('/laporan-transaksi','LaporanController@transaksi');
});


//login
Route::get('/login','AuthController@login')->name('login');
Route::post('/login','AuthController@cekLogin');
Route::get('/logout','AuthController@logout');