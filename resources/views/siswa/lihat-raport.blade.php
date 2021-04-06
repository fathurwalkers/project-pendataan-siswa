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
          font-family: 'Times New Roman', Times, serif;
          /* font-size: 80%; */
          border-collapse: collapse;
          border-spacing: 0;
          width: 100%;
          border: none !important;
        }
        
        /* tr:nth-child(even){background-color: #ddd} */
        </style>
</head>
<body>
    
    <h1>RAPORT NILAI SISWA</h1>

    <table class="table-1">
        <tr>
            <td class="table-1">Nama : </td>
        </tr>
        <tr>
            <td class="table-1">Nama : </td>
        </tr>
    </table>

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