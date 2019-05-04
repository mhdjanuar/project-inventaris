@extends('layout.app')

@section('content')

  <div class="col-md-7">
    <div class="card">
      <div class="card-header">
        <h3>Form Edit Inventaris</h3>
      </div>
      <div class="card-body">
        <!-- @if(session()->get('berhasil'))
          <h4>{{ session()->get('berhasil') }}</h4>
        @endif -->
        <form  action="{{ route('inventaris.update',$findInven->id_inventaris) }}" method="post">
          @method('PATCH')
          @csrf

          <div class="form-row">
                <div class="form-group col-md-4">
                  <label>ID Inventaris</label>
                  <input class="form-control" type="text" name="id_inventaris" value="{{ $findInven->id_inventaris }}" placeholder="ID Inventaris" readonly>
                </div>
                <div class="form-group col-md-4">
                  <label>Nama</label>
                  <input class="form-control" type="text" name="nama" value="{{ $findInven->nama }}" placeholder="Nama">
                </div>
                <div class="form-group col-md-4">
                  <label>Kondisi</label>
                  <input class="form-control" type="text" name="kondisi" value="{{ $findInven->kondisi }}" placeholder="Kondisi">
                </div>
          </div>
          <div class="form-row">
                <div class="form-group col-md-4">
                  <label>Keterangan</label>
                  <input class="form-control" type="text" name="keterangan" value="{{ $findInven->keterangan }}" placeholder="Keterangan">
                </div>
                <div class="form-group col-md-4">
                  <label>Jumlah</label>
                  <input class="form-control" type="text" name="jumlah" value="{{ $findInven->jumlah }}" placeholder="Jumlah">
                </div>
                <div class="form-group col-md-4">
                  <label>ID Jenis</label>
                  <select class="form-control" name="id_jenis">
                    @foreach($jenis as $item)
                    @if($item->id_jenis == $findInven->id_jenis)
                    <option value="{{ $item->id_jenis }}" selected>{{ $item->id_jenis }}</option>
                    @else
                    <option value="{{ $item->id_jenis }}">{{ $item->id_jenis }}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
          </div>
          <div class="form-row">
                <div class="form-group col-md-4">
                  <label >ID Ruang</label>
                  <select class="form-control" name="id_ruang">
                    @foreach($ruang as $item)
                    @if($item->id_ruang == $findInven->id_ruang)
                    <option value="{{ $item->id_ruang}}" selected>{{ $item->id_ruang}}</option>
                    @else
                    <option value="{{ $item->id_ruang}}">{{ $item->id_ruang}}</option>
                    @endif
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <label>Kode Inventaris</label>
                  <input class="form-control" type="text" name="kode_inventaris" value="{{ $findInven->kode_inventaris }}" placeholder="Kode Inventaris " readonly>
                </div>
                <div class="form-group col-md-4">
                  <label>ID Petugas</label>
                  <select class="form-control" name="id_petugas">
                    @foreach($petugas as $item)
                    @if($item->id_petugas == $findInven->petugas)
                    <option value="{{ $item->id_petugas }}" selected>{{ $item->id_petugas }}</option>
                    @else
                    <option value="{{ $item->id_petugas }}">{{ $item->id_petugas }}</option>
                    @endif
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
