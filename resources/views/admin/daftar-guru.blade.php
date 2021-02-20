@extends('layouts.adminlayouts')

@section('title', 'Daftar Guru - Sistem Pendataan Siswa')

@section('header-text', 'Daftar Guru')

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
      <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Kelola</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarguru as $guru)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $guru->nama_lengkap }}</td>
                <td>{{ $guru->nip_nisn }}</td>
                <td>{{ $guru->jenis_kelamin }}</td>
                <td>{{ $guru->telepon }}</td>
                <td class="text-center d-flex">
                  <a href="{{ route('edit-guru', $guru->id) }}" class="btn btn-info mx-1">Edit</a>
                  <a href="{{ route('biodata-guru', $guru->id) }}" class="btn btn-success mx-1">Selengkapnya</a>
                  <form action="{{ route('hapus-guru', $guru->id) }}" method="POST">
                    @csrf
                    <input type="hidden" value="{{ $guru->id }}" name="idguru">
                    <button id="tombolhapus" type="submit" class="btn btn-danger mx-1">Hapus</button>
                  </form>
              </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
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
