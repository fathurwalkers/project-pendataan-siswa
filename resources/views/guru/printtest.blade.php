<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Siswa</th>
        <th scope="col">NISN</th>
        <th scope="col">Nama Pengajar</th>
        <th scope="col">Nilai Tugas</th>
        <th scope="col">Nilai UTS</th>
        <th scope="col">Nilai UAS</th>
        <th scope="col">Nilai Absen</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($nilai as $item)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $item->detail->nama_lengkap }}</td>
          <td>{{ $item->detail->nip_nisn }}</td>
          <td>{{ $item->pengajar->detail->nama_lengkap }}</td>
          <td>{{ $item->nilai_siswa_tugas }}</td>
          <td>{{ $item->nilai_siswa_uts }}</td>
          <td>{{ $item->nilai_siswa_uas }}</td>
          <td>{{ $item->nilai_siswa_absensi }}</td>
        </tr> 
        @endforeach
    </tbody>
  </table>