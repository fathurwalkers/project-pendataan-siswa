@extends('layouts.adminlayouts')

@section('title', 'Tambah Pengajar - Sistem Pendataan Siswa')

@section('header-text', 'Tambah Pengajar')

@section('main-content')
<!-- Default box -->
<div class="card">
  <div class="card-body">
    <form action="{{ route('post-tambah-siswa') }}" method="POST" enctype="multipart/form-data">

      @csrf

      {{-- <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" autofocus>
      </div>

      <div class="form-group">
        <label for="nip_nisn">NISN</label>
        <input type="text" class="form-control" id="nip_nisn" name="nip_nisn">
      </div>

      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat">
      </div>

      <div class="form-group">
        <label for="telepon">No. Telepon</label>
        <input type="text" class="form-control" id="telepon" name="telepon">
      </div> --}}

      <div class="form-group my-3">
        <div class="input-group mb-3 my-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Mata Pelajaran</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="matapelajaran_id">
            <option selected>Pilih...</option>
            @foreach ($matapelajaran as $mapel)
            <option value="{{ $mapel->id }}">{{ $mapel->nama_matapelajaran }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <button type="submit" class="btn btn-primary my-2">Tambah Pengajar</button>

    </form>

    <a href="{{ route('daftar-siswa') }}" class="float-right btn btn-danger my-1 mx-2">Kembali</a>

  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection
