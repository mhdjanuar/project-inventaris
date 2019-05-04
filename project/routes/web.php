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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login','AuthController@login')->name('login');
Route::post('login','AuthController@postLogin')->name('login.postLogin');
Route::get('logout','AuthController@logout')->name('logout');

//admin
Route::group(['middleware' => ['auth','cekRole:1'] ],function(){
  Route::resource('inventaris','InventarisController');

  Route::get('laporan','LaporanController@index')->name('laporan.index');
  Route::get('laporan/cetakPDF','LaporanController@generteLaporan')->name('laporan.generteLaporan');
});

//operator dan admin
Route::group(['middleware' => ['auth','cekRole:1,2,3'] ],function(){
Route::resource('peminjaman','PeminjamanController');
Route::get('peminjaman/detailBarang/{id}','PeminjamanController@detailBarang')->name('peminjaman.detailBarang');
Route::put('peminjaman/pengembalian/{id}','PeminjamanController@pengembalian')->name('peminjaman.pengembalian');
});

//peminjam
// Route::get('peminjaman','PeminjamanController@asd')->name('peminjaman.asd');
