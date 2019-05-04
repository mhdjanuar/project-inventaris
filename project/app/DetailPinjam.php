<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPinjam extends Model
{
    protected $table = 'detail_pinjam';
    protected $primaryKey = 'id_detail_pinjam';
    protected $fillable = ['id_inventaris','jumlah'];

    public $timestamps = false;

    public function inventaris()
    {
      return $this->belongsTo('App\Inventaris','id_inventaris');
    }

    public function peminjaman()
    {
      return $this->hasOne('App\Peminjaman','id_detail_pinjam');
    }
}
