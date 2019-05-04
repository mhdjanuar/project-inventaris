<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';
    protected $primaryKey = 'id_peminjaman';
    protected $fillable = ['id_peminjaman','tanggal_kembali','id_pegawai'];

    public $incrementing = false;
    public $timestamps = false;


    public function detailPinjam()
    {
      return $this->belongsTo('App\DetailPinjam','id_detail_pinjam');
    }

    public function pegawai()
    {
      return $this->belongsTo('App\Pegawai','id_pegawai');
    }
}
