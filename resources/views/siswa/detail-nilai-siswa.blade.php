@extends('layouts.adminlayouts')

@section('title', 'Daftar Informasi Nilai Siswa - Sistem Pendataan Guru')

@section('header-text', 'Daftar Informasi Nilai Siswa')

@section('main-content')
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title my-2">Daftar Informasi Nilai Siswa</h3>
    <div class="card-tools">
      {{-- <a href="{{ route('lihat-raport') }}" class="btn btn-success float-right">Cetak Raport</a> --}}
      <a href="{{ route('lihat-raport2') }}" class="btn btn-primary float-right mx-2">Lihat Raport</a>
    </div>
  </div>
  <div class="card-body">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Kelas</th>
                <th>Nama Siswa</th>
                <th>Matapelajaran</th>
                <th>Nilai Tugas</th>
                <th>Nilai UTS</th>
                <th>Nilai UAS</th>
                <th>Nilai Absen</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nilai as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->detail->kelas->kelas }}</td>
                <td>{{ $item->detail->nama_lengkap }}</td>
                <td>{{ $item->matapelajaran->nama_matapelajaran }}</td>
                <td>{{ number_format($item->nilai_siswa_tugas) }}</td>
                <td>{{ number_format($item->nilai_siswa_uts) }}</td>
                <td>{{ number_format($item->nilai_siswa_uas) }}</td>
                <td>{{ number_format($item->nilai_siswa_absensi) }}</td>
            </tr>
            @endforeach
    </table>
  </div>
  <!-- /.card-body -->
  {{-- <div class="card-footer">
    Footer Section
  </div> --}}
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection

@section('after-script')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );
</script>
@endsection
