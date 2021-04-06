<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>RAPORT SISWA</title>
    <style>
        table {
          border-collapse: collapse;
          border-spacing: 0;
          width: 100%;
          border: 1px solid #000000;
        }
        
        th, td {
          text-align: center;
          padding: 8px;
          font-family: 'Times New Roman', Times, serif;
          font-size: 80%;
          border: 1px solid #000000;

        }

        h1 {
          text-align: center;
          padding: 8px;
          font-family: 'Times New Roman', Times, serif;
        }

        .table-1 {
          text-align: left;
          padding: 8px;
          margin: 10%;
          font-family: 'Times New Roman', Times, serif;
          font-size: 100% !important;
          border-collapse: collapse;
          border-spacing: 0;
          width: 100%;
          border: none !important;
        }

        .table-2 {
          text-align: left !important;
          padding: 0px !important;
          margin: 0px !important;
          margin-bottom: 0%;
          font-family: 'Times New Roman', Times, serif;
          font-size: 100% !important;
          border-collapse: collapse;
          border-spacing: 0;
          width: 20% !important;
          border: none !important;
        }

        @media print {
            @page { margin: 0; }
            body { margin: 1.6cm; }
        }
        
        /* tr:nth-child(even){background-color: #ddd} */
        </style>
</head>
<body>
    
    <h1>RAPORT NILAI SISWA</h1>

    <table class="table-1">
        <tr>
            <td class="table-2">
                <p>Nama &nbsp;: {{ $data2->nama_lengkap }}</p>
                <p>Alamat : {{ $data2->alamat }}</p>
            </td>
            <td class="table-2">
                <p>Kelas : {{ $pengajar->kelas->kelas }}</p>
                <p>Tahun Ajaran : {{ $pengajar->semester->tahun_ajaran }}</p>
            </td>
        </tr>
    </table>

    <br />

    <div style="overflow-x:auto;">
        <table>
          <tr>
            <th>MATAPELAJARAN</th>
            <th>KELAS</th>
            <th>NILAI TUGAS</th>
            <th>NILAI ABSEN</th>
            <th>NILAI UTS</th>
            <th>NILAI UAS</th>
            <th>Keterangan</th>
          </tr>
          @foreach ($data as $item)
          <tr>
            <td>{{ $item->matapelajaran->nama_matapelajaran }}</td>
            <td>{{ $item->pengajar->kelas->kelas }}</td>
            <td>{{ $item->nilai_siswa_tugas }}</td>
            <td>{{ $item->nilai_siswa_absensi }}</td>
            <td>{{ $item->nilai_siswa_uts }}</td>
            <td>{{ $item->nilai_siswa_uas }}</td>
            <td> </td>
          </tr>
          @endforeach
        </table>

</body>
</html>