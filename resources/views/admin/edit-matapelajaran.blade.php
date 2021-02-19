@extends('layouts.adminlayouts')

@section('title', 'Edit Mata Pelajaran - Sistem Pendataan Siswa')

@section('header-text', 'Edit Mata Pelajaran')

@section('main-content')
<!-- Default box -->
<div class="card">
  <div class="card-body">
    <form action="{{ route('update-matapelajaran', $matapelajaran->id) }}" method="POST" enctype="multipart/form-data">

      @csrf

      <div class="form-group">
        <label for="nama_matapelajaran">Nama Mata Pelajaran</label>
        <input type="text" class="form-control" id="nama_matapelajaran" name="nama_matapelajaran" value="{{ $matapelajaran->nama_matapelajaran }}" autofocus>
      </div>

      <button type="submit" class="btn btn-primary my-2">Update Mata Pelajaran</button>

    </form>

    <a href="{{ route('daftar-matapelajaran') }}" class="float-right btn btn-danger my-1 mx-2">Kembali</a>

  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection
