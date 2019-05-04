<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    protected $table = 'inventaris';
    protected $primaryKey = 'id_inventaris';
    public $incrementing = false;

    protected $fillable = ['id_inventaris','nama','kondisi',
                           'keterangan','jumlah','id_jenis',
                           'id_ruang','kode_inventaris','id_petugas'
                          ];

    public $timestamps = false;

    public function detailPinjam()
    {
      return $this->hasMany('App\DetailPinjam','id_inventaris');
    }

}
