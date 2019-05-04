<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventaris;
use App\DetailPinjam;
use App\Peminjaman;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peminjaman = Peminjaman::where('status_peminjaman',1)->get();
        return view('peminjaman.index',compact('peminjaman'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lastID = Peminjaman::max('id_peminjaman');
        if ($lastID) {
          $subID = substr($lastID,2,3) + 1;
        }else {
          $subID = '001';
        }

        $genereteId = Peminjaman::convertAngka($subID);
        $idPinjam = 'PM'.$genereteId;

        return view('peminjaman.tambahPinjaman')->with('idPinjam',$idPinjam);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateDetailPinjam = $request->validate([
          'id_inventaris' => 'required',
          'jumlah' => 'required'
        ]);

        DetailPinjam::create($validateDetailPinjam);
        $idDetailPinjam = DetailPinjam::max('id_detail_pinjam');

        $pinjam = new Peminjaman;
        $pinjam->id_peminjaman = $request->input('id_peminjaman');
        $pinjam->id_detail_pinjam = $idDetailPinjam;
        $pinjam->tanggal_kembali = $request->input('tanggal_kembali');
        $pinjam->status_peminjaman = 1;
        $pinjam->id_pegawai = $request->input('id_pegawai');
        $pinjam->save();

        return redirect()->route('peminjaman.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $peminjaman = Peminjaman::find($id);

        return view('peminjaman.edit',compact('peminjaman'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::find($id);
        $idDetailPinjam = $peminjaman->detailPinjam->id_detail_pinjam;
        $idPinjam = $peminjaman->id_peminjaman;

        //update detail_pinjam
        $validateDetailPinjam = $request->validate([
          'id_inventaris' => 'required',
          'jumlah' => 'required'
        ]);
        DetailPinjam::find($idDetailPinjam)->update($validateDetailPinjam);

        // //update peminjaman
        $validatePinjaman = $request->validate([
          'id_peminjaman' => 'required',
          'tanggal_kembali' => 'required',
          'id_pegawai' => 'required'
        ]);

        Peminjaman::find($idPinjam)->update($validatePinjaman);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Peminjaman::find($id)->delete();
        return redirect()->route('peminjaman.index');
    }

    public function detailBarang($id)
    {
        $detailPinjam = DetailPinjam::find($id);
        $detailPinjam->inventaris;
        return view('peminjaman.detailBarang',compact('detailPinjam'));
    }

    public function pengembalian($id)
    {
       $peminjaman = Peminjaman::find($id);

       //pengembalian->mengubah status menjadi 0
       $peminjaman->status_peminjaman = 0;
       $peminjaman->save();
       return redirect()->route('peminjaman.index');
    }
}
