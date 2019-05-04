@extends('layout.app')

@section('content')

<div class="col-md-8">
  <div class="card">
    <div class="card-header">
      <h3>List Peminjaman</h3>
    </div>
    <div class="card-body">
      <a href="{{ route('peminjaman.create') }}">Tambah Data</a>
      <table class="table">
        <thead>
          <tr>
            <th>ID Peminjaman</th>
            <th>Nama Peminjam</th>
            <th>Tanggal Kembali</th>
            <th>ID Inventaris</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($peminjaman as $listPinjam)
          <tr>
            <td>{{ $listPinjam->id_peminjaman }}</td>
            <td>{{ $listPinjam->pegawai->nama_pegawai }}</td>
            <td>{{ $listPinjam->tanggal_kembali }}</td>
            <td>{{ $listPinjam->detailPinjam->id_inventaris }}</td>
            <td>
              <a href="{{ route('peminjaman.detailBarang',$listPinjam->detailPinjam->id_detail_pinjam) }}">Detail</a>|
              <a href="{{ route('peminjaman.edit',$listPinjam->id_peminjaman)  }}">Edit</a>|
              <form action="{{ route('peminjaman.destroy',$listPinjam->id_peminjaman) }}" method="post">
                @method('DELETE')
                @csrf
                <input type="submit" value="Hapus">
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
