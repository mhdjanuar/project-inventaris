@extends('layout.app')

@section('content')

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3>Form Tambah Peminjaman</h3>
      </div>
      <div class="card-body">
        <!-- @if(session()->get('berhasil'))
          <h4>{{ session()->get('berhasil') }}</h4>
        @endif -->
        <form  action="{{ route('peminjaman.store') }}" method="post">
          @method('POST')
          @csrf
            <div class="form-row">
                  <div class="col-md-4">
                    <label>ID Peminjaman</label>
                    <input class="form-control" type="text" name="id_peminjaman" value="{{ $idPinjam }}" readonly>
                  </div>
                  <!-- <div class="col-md-4">
                    <label>ID Inventaris</label>
                    <input class="form-control" type="text" name="id_inventaris" value="">
                  </div> -->
                  <div class="form-group col-md-4">
                    <label>Id Inventaris</label>
                    <select class="form-control" name="id_inventaris">
                      @foreach($inventaris as $itemInven)
                      <option value="{{ $itemInven->id_inventaris }}">{{ $itemInven->id_inventaris }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="col-md-4">
                    <label>Jumlah</label>
                    <input class="form-control" type="text" name="jumlah" value="">
              </div>
            </div>

            <div class="form-row">
                  <div class="col-md-6">
                    <label>Tanggal Kembali</label>
                    <input class="form-control" type="date" name="tanggal_kembali" value="">
                  </div>
                  <!-- <div class="col-md-6">
                    <label>ID Pegawai</label>
                    <input class="form-control" type="text" name="id_pegawai" value="">
                  </div> -->
                  <div class="form-group col-md-6">
                    <label>Id Pegawai</label>
                    <select class="form-control" name="id_pegawai">
                      @foreach($pegawai as $itemPegawai)
                      <option value="{{ $itemPegawai->id_pegawai }}">{{ $itemPegawai->id_pegawai }}</option>
                      @endforeach
                    </select>
                  </div>
            </div><br>

            <button class="btn btn-primary" type="submit">Simpan</button>
            @if(auth()->user()->id_level == 1 || auth()->user()->id_level == 2)
            <a class="btn btn-danger" href="{{ route('peminjaman.index') }}">Kembali</a>
            @endif
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
