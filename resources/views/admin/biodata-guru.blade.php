@extends('layouts.adminlayouts')

@section('title', 'Biodata Guru - Sistem Pendataan Siswa')

@section('header-text', 'Biodata Guru')

@section('main-content')
<div class="card mb-3 col-md-12">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{ asset($guru->foto) }}" alt="{{ $guru->nama_lengkap }}" class="img-fluid mt-2 mb-2" width="350px">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title my-1">Nama Lengkap &nbsp;&nbsp;&nbsp;: &nbsp;<b>{{ strtoupper($guru->nama_lengkap) }}</b></h5>
          <p class="card-text my-1">
              NIP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $guru->nip_nisn }} <br>

              Jenis Kelamin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $guru->jenis_kelamin }}<br>

              Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $guru->alamat }} <br>

              Telepon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $guru->telepon }} <br>
        </p>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('after-script')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection