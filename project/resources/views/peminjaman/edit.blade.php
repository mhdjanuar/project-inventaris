@extends('layout.app')

@section('content')

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3>Form Edit <?php foreach ($variable as $key => $value): ?>

        <?php endforeach; ?>Inventaris</h3>
      </div>
      <div class="card-body">
        <!-- @if(session()->get('berhasil'))
          <h4>{{ session()->get('berhasil') }}</h4>
        @endif -->
        <form  action="{{ route('peminjaman.update',$peminjaman->id_peminjaman) }}" method="post">
          @method('PUT')
          @csrf
            <div class="form-row">
                  <div class="col-md-4">
                    <label>ID Peminjaman</label>
                    <input class="form-control" type="text" name="id_peminjaman" value="{{ $peminjaman->id_peminjaman }}" readonly>
                  </div>
                  <div class="col-md-4">
                    <label>ID Inventaris</label>
                    <input class="form-control" type="text" name="id_inventaris" value="{{ $peminjaman->detailPinjam->id_inventaris}}">
                  </div>
                  <div class="col-md-4">
                    <label>Jumlah</label>
                    <input class="form-control" type="text" name="jumlah" value="{{ $peminjaman->detailPinjam->jumlah }}">
              </div>
            </div>

            <div class="form-row">
                  <div class="col-md-6">
                    <label>Tanggal Kembali</label>
                    <input class="form-control" type="date" name="tanggal_kembali" value="{{ $peminjaman->tanggal_kembali }}">
                  </div>
                  <div class="col-md-6">
                    <label>ID Pegawai</label>
                    <input class="form-control" type="text" name="id_pegawai" value="{{ $peminjaman->id_pegawai}}">
                  </div>
            </div><br>

            <button class="btn btn-primary" type="submit">Simpan</button>
            <a class="btn btn-danger" href="{{ route('peminjaman.index') }}">Kembali</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
