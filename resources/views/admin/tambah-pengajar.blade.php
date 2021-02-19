@extends('layouts.adminlayouts')

@section('title', 'Tambah Pengajar - Sistem Pendataan Siswa')

@section('header-text', 'Tambah Pengajar')

@section('main-content')
<!-- Default box -->
<div class="card">
  <div class="card-body">
    <form action="{{ route('post-tambah-siswa') }}" method="POST" enctype="multipart/form-data">

      @csrf

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

      <div class="form-group my-3">
        <div class="input-group mb-3 my-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="kelas_id">
            <option selected>Pilih...</option>
            @foreach ($kelas as $kls)
            <option value="{{ $kls->id }}">{{ $kls->kelas }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group my-3">
        <div class="input-group mb-3 my-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Semester / Tahun Ajaran</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="semester_id">
            <option selected>Pilih...</option>
            @foreach ($semester as $smtr)
            <option value="{{ $smtr->id }}">{{ $smtr->tahun_ajaran }}</option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="form-group my-3">
        <div class="input-group mb-3 my-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">NIP Guru</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="matapelajaran_id">
            <option selected>Pilih...</option>
            @foreach ($guru as $gr)
            <option value="{{ $gr->id }}">{{ $gr->nip_nisn }} / {{ $gr->nama_lengkap }}</option>
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
