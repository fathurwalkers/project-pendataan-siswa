@extends('layouts.adminlayouts')

@section('title', 'Biodata Siswa - Sistem Pendataan Siswa')

@section('header-text', 'Biodata Siswa')

@section('main-content')
<div class="card mb-3 col-md-12">
    <div class="row g-0">
      <div class="col-md-4">
        @if ($siswa->foto == null)
        <img src="{{ asset('/image/image-hmDRkX.png') }}" alt="{{ $siswa->nama_lengkap }}" class="img-fluid mt-2 mb-2" width="350px">
        @endif
        @if($siswa->foto)
        <img src="{{ asset($siswa->foto) }}" alt="{{ $siswa->nama_lengkap }}" class="img-fluid mt-2 mb-2" width="350px">
        @endif
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title my-1">Nama Lengkap &nbsp;&nbsp;&nbsp;: &nbsp;<b>{{ strtoupper($siswa->nama_lengkap) }}</b></h5>
          <p class="card-text my-1">
              NISN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $siswa->nip_nisn }} <br>

              Kelas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $siswa->kelas->kelas }} <br>

              Status Siswa &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<span class="badge badge-success">{{ $siswa->siswa_status }}</span><br>

              Jenis Kelamin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $siswa->jenis_kelamin }}<br>

              Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $siswa->alamat }} <br>

              Telepon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $siswa->telepon }} <br>
          </p>
        </div>
      </div>
    </div>
    <div class="row col-sm-12 col-lg-12 justify-content-center">
      <a href="{{ route('dashboard') }}" class="btn btn-info my-3 float-right px-5">Kembali</a>
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