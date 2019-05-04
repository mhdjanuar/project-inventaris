<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventaris;
use App\Jenis;
use App\Ruang;
use App\Petugas;
use DB;

class InventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventaris = Inventaris::all();
        // dd($inventaris);
        return view('inventaris.index',compact('inventaris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idLast = Inventaris::max('id_inventaris');

        if ($idLast) $subId = substr($idLast,3,3) + 1;
        else $subId = '001';

        $genereteID = Inventaris::ConvertAngka($subId);

        $generate = array('id_inven_generete' => 'INV'.$genereteID ,
                          'kode' => 'INV/'.$genereteID.'/2019'
                          );

        $jenis = Jenis::all();
        $ruang = Ruang::all();
        $petugas = Petugas::all();
        return view('inventaris.tambahInven',compact('jenis','ruang','petugas'))->with( $generate );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      // $validatedData = $request->validate([
      //        'id_inventaris' => 'required|max:200',
      //        'nama' => 'required|max:200',
      //        'kondisi' => 'required|max:200',
      //        'keterangan' => 'required|max:200',
      //        'jumlah' => 'required|max:200',
      //        'id_jenis' => 'required|max:200',
      //        'id_ruang' => 'required|max:200',
      //        'kode_inventaris' => 'required|max:200',
      //        'id_petugas' => 'required|max:200',
      //    ]);
      $id = $request->input('id_inventaris');
      $nama = $request->input('nama');
      $kondisi = $request->input('kondisi');
      $keterangan = $request->input('id_inventaris');
      $jumlah = $request->input('jumlah');
      $id_jenis = $request->input('id_jenis');
      $id_ruang = $request->input('id_ruang');
      $kode = $request->input('kode_inventaris');
      $id_petugas = $request->input('id_petugas');

        // Inventaris::create($validatedData);
        DB::select("Call createInventaris('$id','$nama','$kondisi','$keterangan',$jumlah,'$id_jenis','$id_ruang','$kode','$id_petugas')");
        return redirect()->route('inventaris.create')->with('berhasil','Berhasil Tambah Data');
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
      $jenis = Jenis::all();
      $ruang = Ruang::all();
      $petugas = Petugas::all();
      $findInven = Inventaris::where('id_inventaris',$id)->first();
      return view('inventaris.edit',compact('jenis','ruang','petugas','findInven'));
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
      $validatedData = $request->validate([
             'id_inventaris' => 'required|max:200',
             'nama' => 'required|max:200',
             'kondisi' => 'required|max:200',
             'keterangan' => 'required|max:200',
             'jumlah' => 'required|max:200',
             'id_jenis' => 'required|max:200',
             'id_ruang' => 'required|max:200',
             'kode_inventaris' => 'required|max:200',
             'id_petugas' => 'required|max:200',
         ]);

        Inventaris::where('id_inventaris',$id)->update($validatedData);
        return redirect()->route('inventaris.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Inventaris::where('id_inventaris',$id)->delete();
        return redirect()->route('inventaris.index');
    }
}
