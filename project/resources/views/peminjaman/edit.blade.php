@extends('layout.app')

@section('content')

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3>Form Edit Peminjaman</h3>
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
                  <!-- <div class="col-md-4">
                    <label>ID Inventaris</label>
                    <input class="form-control" type="text" name="id_inventaris" value="{{ $peminjaman->detailPinjam->id_inventaris}}">
                  </div> -->
                  <div class="form-group col-md-4">
                    <label>ID Inventaris</label>
                    <select class="form-control" name="id_inventaris">
                      @foreach($inventaris as $item)
                      @if($item->id_inventaris == $peminjaman->detailPinjam->id_inventaris)
                      <option value="{{ $item->id_inventaris }}" selected>{{ $item->id_inventaris }}</option>
                      @else
                      <option value="{{ $item->id_inventaris }}">{{ $item->id_inventaris }}</option>
                      @endif
                      @endforeach
                    </select>
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
                    <!-- <input class="form-control" type="text" name="id_pegawai" value="{{ $peminjaman->id_pegawai}}"> -->
                    <select class="form-control" name="id_pegawai">
                      @foreach($pegawai as $item)
                      @if($item->id_pegawai == $peminjaman->id_pegawai)
                      <option value="{{ $item->id_pegawai }}" selected>{{ $item->id_pegawai }}</option>
                      @else
                      <option value="{{ $item->id_pegawai }}">{{ $item->id_pegawai }}</option>
                      @endif
                      @endforeach
                    </select>
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
