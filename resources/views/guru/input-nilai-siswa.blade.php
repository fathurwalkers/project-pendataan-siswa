@extends('layouts.adminlayouts')

@section('title', 'Informasi Detail Pengajar - Sistem Pendataan Siswa')

@section('header-text', 'Informasi Detail Pengajar')

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
                <th>Kelas</th>
                <th>Status</th>
                <th>Input Nilai Siswa</th>
            </tr>
        </thead>
        <tbody>
            <form action="" method="POST">
                @csrf
            @foreach ($siswa as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->nip_nisn }}</td>
                <td>{{ $item->kelas->kelas }}</td>
                <td>{{ $item->siswa_status }}</td>
                <td>
                        <input type="text" name="nilai" placeholder="Masukkan Nilai Siswa">
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
