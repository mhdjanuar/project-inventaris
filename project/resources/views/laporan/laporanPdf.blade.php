
<h3>Laporan Peminajaman</h3>
<table border="1">
  <thead>
    <tr>
      <th>ID Peminjaman</th>
      <th>Tanggal Peminjaman</th>
      <th>Tanggal Kembali</th>
    </tr>
  </thead>
  <tbody>
    @foreach($peminjaman as $item)
    <tr>
      <td>{{ $item->id_peminjaman }}</td>
      <td>{{ $item->tanggal_pinjam }}</td>
      <td>{{ $item->tanggal_kembali }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
