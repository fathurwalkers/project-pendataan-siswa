@extends('layouts.adminlayouts')

@section('title', 'Daftar Siswa - Sistem Pendataan Siswa')

@section('header-text', 'Daftar Siswa')

@section('main-content')
<div class="card mb-3 col-md-12">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{ asset($siswa->foto) }}" alt="{{ $siswa->nama_lengkap }}" class="img-fluid">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title my-1"><b>{{ strtoupper($siswa->nama_lengkap) }}</b></h5>
          <p class="card-text my-1">
              NISN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $siswa->nip_nisn }} <br>
              Kelas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $siswa->siswa_kelas }} <br>
              Status Siswa &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<span class="badge badge-success">{{ $siswa->siswa_status }}</span><br>
              Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $siswa->alamat }} <br>
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
    } );
</script>
@endsection