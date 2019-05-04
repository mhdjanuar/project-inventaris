@extends('layout.app')

@section('content')

  <div class="col-md-8">
    <div class="card">
      <div class="card-header">
        <h3>Form Tambah Inventaris</h3>
      </div>
      <div class="card-body">
        @if(session()->get('berhasil'))
          <h4>{{ session()->get('berhasil') }}</h4>
        @endif
        <form  action="{{ route('inventaris.store') }}" method="post">
          @method('POST')
          @csrf
            <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>ID Inventaris</label>
                    <input class="form-control" type="text" name="id_inventaris" value="{{ $id_inven_generete }}" placeholder="ID Inventaris" readonly>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Nama</label>
                    <input class="form-control" type="text" name="nama" value="" placeholder="Nama">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Kondisi</label>
                    <input class="form-control" type="text" name="kondisi" value="" placeholder="Kondisi">
                  </div>
            </div>
            <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>Keterangan</label>
                    <input class="form-control" type="text" name="keterangan" value="" placeholder="Keterangan">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Jumlah</label>
                    <input class="form-control" type="text" name="jumlah" value="" placeholder="Jumlah">
                  </div>
                  <div class="form-group col-md-4">
                    <label>Id Jenis</label>
                    <select class="form-control" name="id_jenis">
                      @foreach($jenis as $itemJenis)
                      <option value="{{ $itemJenis->id_jenis }}">{{ $itemJenis->id_jenis }}</option>
                      @endforeach
                    </select>
                  </div>
            </div>
            <div class="form-row">
                  <div class="form-group col-md-4">
                    <label>Id Ruang</label>
                    <select class="form-control" name="id_ruang">
                      @foreach($ruang as $itemRuang)
                      <option value="{{ $itemRuang->id_ruang }}">{{ $itemRuang->id_ruang }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group col-md-4">
                    <label>Kode Inventaris</label>
                    <input class="form-control" type="text" name="kode_inventaris" value="{{ $kode }}" placeholder="Kode Inventaris " readonly>
                  </div>
                  <div class="form-group col-md-4">
                    <label>ID Petugas</label>
                    <select class="form-control" name="id_petugas">
                      @foreach($petugas as $itemPetugas)
                      <option value="{{ $itemPetugas->id_petugas }}">{{ $itemPetugas->id_petugas }}</option>
                      @endforeach
                    </select>
                  </div>
            </div>
            <button class="btn btn-primary" type="submit">Simpan</button>
            <a class="btn btn-danger" href="{{ route('inventaris.index') }}">Kembali</a>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
