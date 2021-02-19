@extends('layouts.adminlayouts')

@section('title', 'Edit Guru - Sistem Pendataan Siswa')

@section('header-text', 'Edit Guru')

@section('main-content')
<!-- Default box -->
<div class="card col-sm-12">
  <div class="card-body">
    <form action="{{ route('update-guru', $guru->id) }}" method="POST" enctype="multipart/form-data">

      @csrf

      <input type="hidden" value="{{ $guru->id }}" name="id_guru">
      <input type="hidden" value="{{ $guru->foto }}" name="foto_guru">

      <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $guru->nama_lengkap }}" autofocus>
      </div>

      <div class="form-group">
        <label for="nip_nisn">NIP</label>
        <input type="text" class="form-control" id="nip_nisn" name="nip_nisn" value="{{ $guru->nip_nisn }}">
      </div>

      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $guru->alamat }}">
      </div>

      <div class="form-group">
        <label for="telepon">No. Telepon</label>
        <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $guru->telepon }}">
      </div>

      <div class="form-group my-3">
        <div class="input-group mb-3 my-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="jenis_kelamin" value="{{ $guru->jenis_kelamin }}">
            <option selected>{{ $guru->jenis_kelamin }}</option>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
          </select>
        </div>
      </div>

      <div class="form-group my-3">
        <div class="input-group mb-3 my-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Upload Foto</span>
          </div>
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01" name="foto" value="{{ $guru->foto }}">
            <label class="custom-file-label" for="inputGroupFile01">{{ $guru->foto }}</label>
          </div>
        </div>
      </div>

      <div class="form-group my-3">
        <div class="input-group mb-3 my-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Role Status</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="role_status" value="{{ $guru->role_status }}">
            <option selected value="{{ $guru->jenis_kelamin }}">Guru / Pengajar</option>
            <option value="guru">Guru / Pengajar</option>
            <option value="kepsek">Kepala Sekolah</option>
          </select>
        </div>
      </div>

      <button type="submit" class="btn btn-primary my-2">Tambah Guru</button>

    </form>

    <a href="{{ route('daftar-guru') }}" class="float-right btn btn-danger my-1 mx-2">Kembali</a>

  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection
