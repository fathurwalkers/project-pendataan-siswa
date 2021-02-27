@extends('layouts.adminlayouts')

@section('title', 'Informasi Detail Nilai Siswa - Sistem Pendataan Siswa')

@section('header-text', 'Informasi Detail Nilai Siswa')

@section('after-css')
    <style>
      .list-pengajar {
        list-style: none;
      }

      .displaytidakada {
        display: none;
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
      <form action="{{ route('post-input-nilai-siswa', [$pengajar->kelas->id, $pengajar->matapelajaran->id]) }}" method="POST">
          @csrf
          <input type="hidden" value="{{ $pengajar->matapelajaran->id }}" name="matapelajaranid">
    <table id="" class="table">
        {{-- <p>Siswa yang mengambil kelas ini</p> --}}
        <thead class="thead-dark table-bordered border-1">
            <tr>
                <th>#</th>
                <th>Nama Siswa</th>
                <th>NISN</th>
                <th>Kelas</th>
                <th>Input Nilai Siswa</th>
            </tr>
        </thead>
        <tbody class="table-bordered border-1">
          <div class="displaytidakada">
            {{ $j = 1 }}
            {{ $k = 1 }}
            {{ $o = 1 }}
            {{ $uas = 1 }}
            {{ $uts = 1 }}
            {{ $tugas = 1 }}
            {{ $absensi = 1 }}
          </div>
            @foreach ($siswa as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->nip_nisn }}</td>
                <td>{{ $item->kelas->kelas }}</td>
                <td>
                    <input type="text" name="nilai_siswa_tugas[{{$tugas++}}]" placeholder="Nilai Tugas...">
                    <input type="text" name="nilai_siswa_absensi[{{$absensi++}}]" placeholder="Nilai Absensi...">
                    <input type="text" name="nilai_siswa_uts[{{$uts++}}]" placeholder="Nilai UTS...">
                    <input type="text" name="nilai_siswa_uas[{{$uas++}}]" placeholder="Nilai UAS...">
                    <input type="hidden" name="idsiswa[{{$j++}}]" value="{{ $item->id }}">
                    <input type="hidden" name="increment[{{$k++}}]" value="{{ $o++ }}">
                </td>
            </tr>
            @endforeach
        </table>
        <div class="row col-sm-12 col-lg-12 justify-content-center my-4">
            <button type="submit" class="btn btn-primary">Input Nilai Siswa</button>
            </form>
    </div>
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
