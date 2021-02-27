@extends('layouts.adminlayouts')

@section('title', 'Edit Siswa - Sistem Pendataan Siswa')

@section('header-text', 'Edit Siswa')

@section('main-content')
<!-- Default box -->
<div class="card">
  <div class="card-body">
    <form action="{{ route('update-siswa', $siswa->id) }}" method="POST" enctype="multipart/form-data">

      @csrf

      <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $siswa->nama_lengkap }}" autofocus>
      </div>

      <div class="form-group">
        <label for="nip_nisn">NISN</label>
        <input type="text" class="form-control" id="nip_nisn" name="nip_nisn" value="{{ $siswa->nip_nisn }}">
      </div>

      <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $siswa->alamat }}">
      </div>

      <div class="form-group">
        <label for="telepon">No. Telepon</label>
        <input type="text" class="form-control" id="telepon" name="telepon" value="{{ $siswa->telepon }}">
      </div>

      <div class="form-group my-3">
        <div class="input-group mb-3 my-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Jenis Kelamin</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="jenis_kelamin">
            <option selected value="{{ $siswa->jenis_kelamin }}">{{ $siswa->jenis_kelamin }}</option>
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
            <input type="file" class="custom-file-input" id="inputGroupFile01" name="foto">
            <label class="custom-file-label" for="inputGroupFile01">{{ $siswa->foto }}</label>
          </div>
        </div>
      </div>

      <div class="form-group my-3">
        <div class="input-group mb-3 my-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="siswa_kelas">
            <option selected value=""></option>
            @foreach ($kelas as $item)
            <option value="{{ $item->id }}">{{ $item->kelas }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group my-3">
        <div class="input-group mb-3 my-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Status Siswa</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="siswa_status">
            <option selected value="{{ $siswa->siswa_status }}">{{ $siswa->siswa_status }}</option>
            <option value="aktif">Aktif</option>
            <option value="tidak_aktif">Tidak Aktif</option>
          </select>
        </div>
      </div>

      <button type="submit" class="btn btn-primary my-2">Update Siswa</button>

    </form>

    <a href="{{ route('daftar-siswa') }}" class="float-right btn btn-danger my-1 mx-2">Kembali</a>

  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection
