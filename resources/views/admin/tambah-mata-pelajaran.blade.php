@extends('layouts.adminlayouts')

@section('title', 'Tambah Mata Pelajaran - Sistem Pendataan Siswa')

@section('header-text', 'Tambah Mata Pelajaran')

@section('main-content')
<!-- Default box -->
<div class="card">
  <div class="card-body">
    <form action="{{ route('post-tambah-matapelajaran') }}" method="POST" enctype="multipart/form-data">

      @csrf

      <div class="form-group">
        <label for="nama_matapelajaran">Nama Mata Pelajaran</label>
        <input type="text" class="form-control" id="nama_matapelajaran" name="nama_matapelajaran" autofocus>
      </div>

      <button type="submit" class="btn btn-primary my-2">Tambah Mata Pelajaran</button>

    </form>

    <a href="{{ route('daftar-siswa') }}" class="float-right btn btn-danger my-1 mx-2">Kembali</a>

  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection
