@extends('layouts.adminlayouts')

@section('title', 'Tembah Kelas - Sistem Pendataan Siswa')

@section('header-text', 'Tembah Kelas')

@section('main-content')
<!-- Default box -->
<!-- Default box -->
<div class="card">
  <div class="card-body">
    <form action="{{ route('post-tambah-kelas') }}" method="POST" enctype="multipart/form-data">

      @csrf

      <div class="form-group my-3">
        <div class="input-group mb-3 my-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Kelas</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="kelas">
            <option selected value="none">Kelas...</option>
            <option value="VII">VII</option>
            <option value="VIII">VIII</option>
            <option value="IX">IX</option>
          </select>
        </div>
      </div>

      <div class="form-group my-3">
        <div class="input-group mb-3 my-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Urutan Kelas</label>
          </div>
          <select class="custom-select" id="inputGroupSelect01" name="ext_kelas">
            <option selected value="none">Urutan Kelas...</option>
            <option value="A">A</option>
            <option value="B">B</option>
            <option value="C">C</option>
            <option value="D">D</option>
            <option value="E">E</option>
          </select>
        </div>
      </div>

      <button type="submit" class="btn btn-primary my-2">Tambah Kelas</button>

    </form>

    <a href="{{ route('daftar-kelas') }}" class="float-right btn btn-danger my-1 mx-2">Kembali</a>

  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->
@endsection
