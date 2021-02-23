@extends('layouts.adminlayouts')

@section('title', 'Beranda - Sistem Pendataan Siswa')

@section('header-text', 'Halaman Beranda')

@section('main-content')
<div class="col-md-12">
    <div class="card">

      @if($users->level == 'admin')
      <div class="card-body">
        <div class="row">
          <div class="col-md-12 col-lg-3">

            <div class="small-box bg-warning mx-2">
              <div class="inner">
                <h3>{{ $detail_siswa }}</h3>
  
                <p>Total Jumlah Siswa</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{ route('daftar-siswa') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>

          </div>

          <div class="col-md-12 col-lg-3">
            <div class="small-box bg-warning mx-2">
              <div class="inner">
                <h3>{{ $detail_guru }}</h3>
  
                <p>Total Jumlah Guru</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{ route('daftar-guru') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-md-12 col-lg-3">
            <div class="small-box bg-warning mx-2">
              <div class="inner">
                <h3>{{ $detail_kelas }}</h3>
  
                <p>Total Jumlah Kelas</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{ route('daftar-kelas') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-md-12 col-lg-3">
            <div class="small-box bg-warning mx-2">
              <div class="inner">
                <h3>{{ $detail_pengajar }}</h3>
  
                <p>Total Jumlah Pengajar</p>
              </div>
              <div class="icon">
                <i class="fas fa-user-plus"></i>
              </div>
              <a href="{{ route('daftar-pengajar') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
  
        </div>
        

        </div>
      </div>
      @endif

    </div>
</div>

@endsection