<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';

    // public function peminjaman()
    // {
    //   return $this->hasMany('App\Peminjaman','id_pegawai');
    // }
}
