<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>RAPORT SISWA</title>
    <link type="text/css" rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap-grid.min.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link type="text/css" rel="stylesheet" href="css/bootstrap-grid.min.css">
    {{-- <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
    <link type="text/css" rel="stylesheet" href="css/bootstrap-grid.min.css"> --}}
    <style>
        .table-bordered > tbody > tr > td, .table-bordered > tbody > tr > th, .table-bordered > tfoot > tr > td, .table-bordered > tfoot > tr > th, .table-bordered > thead > tr > td, .table-bordered > thead > tr > th {
            border: 1px solid black;
        }
        
        /* th, td {
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
        } */

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

        @media print {
            @page { margin: 0; }
            body { margin: 1.6cm; }
        }
        
        /* tr:nth-child(even){background-color: #ddd} */
        </style>
</head>
<body onload="window.print()">

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12-col-lg-12 ju">

                <h1 class="my-2 mb-4 text-center">RAPORT NILAI SISWA</h1>

                <div class="container">
                    <div class="row mx-auto">
                        <div class="col-sm-8 col-md-8 col-lg-8 ml-3 p-2">
                            <p class="mt-1">Nama &nbsp;: {{ $data2->nama_lengkap }}</p>
                            <p class="mt-1">Alamat : {{ $data2->alamat }}</p>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3 p-2">
                            <p class="mt-1">Kelas : {{ $pengajar->kelas->kelas }}</p>
                            <p class="mt-1">Tahun Ajaran : {{ $pengajar->semester->tahun_ajaran }}</p>
                        </div>
                    </div>
                </div>

    <br />

    {{-- <div style="overflow-x:auto;"> --}}
        <table class="table table-bordered border-1">
          <tr class="">
            <th>MATAPELAJARAN</th>
            <th>KELAS</th>
            <th>NILAI TUGAS</th>
            <th>NILAI ABSEN</th>
            <th>NILAI UTS</th>
            <th>NILAI UAS</th>
            <th>Keterangan</th>
          </tr>
          @foreach ($data as $item)
          <tr class="">
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

            </div>
        </div>
    </div>

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>