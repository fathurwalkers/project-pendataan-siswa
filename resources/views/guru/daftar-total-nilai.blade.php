@extends('layouts.adminlayouts')

@section('title', 'Total Nilai Siswa - Sistem Pendataan Siswa')

@section('header-text', 'Total Nilai Siswa')

@section('after-css')
    <style>
      .list-pengajar {
        list-style: none;
      }
    </style>
@endsection

@section('main-content')
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Title</h3>
    <div class="card-tools">
      <a href="{{ route('dashboard') }}" class="btn btn-info">Kembali</a>
    </div>
  </div>
  <div class="card-body">
      <div class="row">
              <ul>
                <li class="list-pengajar">Nama Pengajar </li>
                <li class="list-pengajar">Matapelajaran </li>
                <li class="list-pengajar">Kelas </li>
              </ul>
              <ul>
                <li class="list-pengajar">: {{ strtoupper($pengajar->detail->nama_lengkap) }}</li>
                <li class="list-pengajar">: {{ strtoupper($pengajar->matapelajaran->nama_matapelajaran) }}</li>
                <li class="list-pengajar">: {{ $pengajar->kelas->kelas }}</li>
              </ul>
      </div>
    <table id="example" class="display" style="width:100%">
        {{-- <p>Siswa yang mengambil kelas ini</p> --}}
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Siswa</th>
                <th>NISN</th>
                <th>Mata Pelajaran</th>
                <th>Nilai Tugas</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Absen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilai as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->detail->nama_lengkap }}</td>
                <td>{{ $item->detail->nip_nisn }}</td>
                <td>{{ $item->matapelajaran->nama_matapelajaran }}</td>
                <td>{{ $item->nilai_siswa_tugas }}</td>
                <td>{{ $item->nilai_siswa_uts }}</td>
                <td>{{ $item->nilai_siswa_uas }}</td>
                <td>{{ $item->nilai_siswa_absensi }}</td>
            </tr>
            @endforeach
    </table>
  </div>
</div>
@endsection

@section('after-script')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection
