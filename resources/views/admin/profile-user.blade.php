@extends('layouts.adminlayouts')

@section('title', 'Informasi User - Sistem Pendataan Siswa')

@section('header-text', 'Informasi User')

@section('main-content')
<div class="card mb-3 col-md-12">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{ asset($profile->foto) }}" alt="{{ $profile->nama_lengkap }}" class="img-fluid mt-2 mb-2" width="350px">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title my-1">Nama Lengkap &nbsp;&nbsp;&nbsp;: &nbsp;<b>{{ strtoupper($profile->nama_lengkap) }}</b></h5>
          <p class="card-text my-1">
              NIP &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $profile->nip_nisn }} <br>

              Status &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<span class="badge badge-success">{{ $profile->siswa_status }}</span><br>

              Jenis Kelamin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $profile->jenis_kelamin }}<br>

              Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $profile->alamat }} <br>

              Telepon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $profile->telepon }} <br>
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