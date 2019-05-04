<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\peminjaman;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
      return view('laporan.index');
    }

    public function generteLaporan()
    {
        $peminjaman = Peminjaman::all();
        $pdf = PDF::loadview('laporan.laporanPdf',compact('peminjaman'));
        return $pdf->stream();
        // return view('laporan.laporanPdf',compact('peminjaman'));
    }
}
