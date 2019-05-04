@extends('layout.app')

@section('content')

<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <h3>Daftar Inventaris</h3>
    </div>
    <div class="card-body">
      <a class="btn btn-success" href="{{ route('inventaris.create') }}">TAMBAH</a>
      <table class="table">
        <thead>
          <tr>
            <th>ID Inventaris</th>
            <th>Nama</th>
            <th>Kondisi</th>
            <th>Keterangan</th>
            <th>Jumlah</th>
            <th>ID Jenis</th>
            <th>Tanggal Register</th>
            <th>ID Ruang</th>
            <th>Kode Inventaris</th>
            <th>ID Petugas</th>
            <th>Action</th>
          </tr>
        </thead>
        @foreach($inventaris as $item)
          <tbody>
            <tr>
              <td>{{ $item->id_inventaris }}</td>
              <td>{{ $item->nama }}</td>
              <td>{{ $item->kondisi }}</td>
              <td>{{ $item->keterangan }}</td>
              <td>{{ $item->jumlah }}</td>
              <td>{{ $item->id_jenis }}</td>
              <td>{{ $item->tanggal_register }}</td>
              <td>{{ $item->id_ruang }}</td>
              <td>{{ $item->kode_inventaris }}</td>
              <td>{{ $item->id_petugas }}</td>
              <td><a class="btn btn-primary" href="{{ route('inventaris.edit',$item->id_inventaris) }}">Edit</a>
                  <form action="{{ route('inventaris.destroy', $item->id_inventaris) }}" method="post">
                      @method('DELETE')
                      @csrf
                      <input class="btn btn-danger" type="submit" value="Hapus">
                  </form>
              </td>
            </tr>
          </tbody>
        @endforeach
      </table>

    </div>
  </div>
</div>
@endsection
