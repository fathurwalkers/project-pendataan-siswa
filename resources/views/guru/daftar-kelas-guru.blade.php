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
      {{-- <div class="row">
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
      </div> --}}
    <table id="example" class="display" style="width:100%">
        {{-- <p>Siswa yang mengambil kelas ini</p> --}}
        <thead>
            <tr>
                <th>#</th>
                <th>Nama guru</th>
                <th>NIP</th>
                <th>Kelas</th>
                <th>Mata Pelajaran</th>
                <th>Kelola</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengajar as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->detail->nama_lengkap }}</td>
                <td>{{ $item->detail->nip_nisn }}</td>
                <td>{{ $item->kelas->kelas }}</td>
                <td>{{ $item->matapelajaran->nama_matapelajaran }}</td>
                <td>
                    <a href="{{ route('guru-detail-kelas', [$item->detail->id, $item->matapelajaran->id]) }}" class="btn btn-primary">Selengkapnya</a>
                    <a href="{{ route('daftar-total-nilai', [$item->detail->id, $item->kelas->id,$item->matapelajaran->id]) }}" class="btn btn-primary">Total Nilai</a>
                </td>
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
