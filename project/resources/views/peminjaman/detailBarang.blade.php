@extends('layout.app')

@section('content')

<div class="col-md-5">
  <div class="card">
    <div class="card-header">
      <h3>Detail Pinjam</h3>
    </div>
    <div class="card-body">
      <li>ID Pegawai : {{ $detailPinjam->peminjaman->id_pegawai }}</li>
      <li>Nama Barang : {{ $detailPinjam->inventaris->nama }}</li>
      <li>Jumlah Pinjam : {{ $detailPinjam->jumlah }}</li><hr>

        <form action="{{ route('peminjaman.pengembalian',$detailPinjam->peminjaman->id_peminjaman) }}" method="post">
          @method('PUT')
          @csrf
          <input class="btn btn-danger" type="submit" value="Pengembalian">
        </form>

    </div>
  </div>
</div>
@endsection
