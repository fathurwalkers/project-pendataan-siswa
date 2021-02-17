@extends('layouts.adminlayouts')

@section('title', 'Tambah Semester - Sistem Pendataan Siswa')

@section('header-text', 'Tambah Semester')

@section('main-content')
<!-- Default box -->
<div class="card">
  <div class="card-body">
    <form action="{{ route('post-tambah-semester') }}" method="POST" enctype="multipart/form-data">

      @csrf

      <div class="form-group">
        <label for="nama_matapelajaran">Tahun Ajaran</label>
        <input type="text" class="form-control" id="nama_matapelajaran" name="tahun_ajaran" autofocus>
      </div>

      <div class="form-group">
        <div class="input-group mb-3 my-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Kepala Sekolah</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="nip_kepsek">
            <option selected>Pilih...</option>
            <option value="{{ $kepsek->nip_nisn }}">{{ $kepsek->nama_lengkap }}</option>
          </select>
        </div>
      </div>

      <input type="hidden" value="{{ $kepsek->id }}" name="idkepsek">

      <button type="submit" class="btn btn-primary my-2">Tambah Semester</button>

    </form>

    <a href="{{ route('daftar-semester') }}" class="float-right btn btn-danger my-1 mx-2">Kembali</a>

  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection
