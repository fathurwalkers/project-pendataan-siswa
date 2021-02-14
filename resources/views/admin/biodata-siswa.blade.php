@extends('layouts.adminlayouts')

@section('title', 'Biodata Siswa - Sistem Pendataan Siswa')

@section('header-text', 'Biodata Siswa')

@section('main-content')
<div class="card mb-3 col-md-12">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="{{ asset($siswa->foto) }}" alt="{{ $siswa->nama_lengkap }}" class="img-fluid mt-2 mb-2" width="350px">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title my-1"><b>Nama Lengkap &nbsp;: &nbsp;{{ strtoupper($siswa->nama_lengkap) }}</b></h5>
          <p class="card-text my-1">
              NISN &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $siswa->nip_nisn }} <br>

              Kelas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $siswa->siswa_kelas }} <br>

              Status Siswa &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;<span class="badge badge-success">{{ $siswa->siswa_status }}</span><br>

              Jenis Kelamin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $siswa->jenis_kelamin }}<br>

              Alamat &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $siswa->alamat }} <br>

              Telepon &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;{{ $siswa->telepon }} <br>
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

    // let tombol = document.getElementById('tombol');
    // tombol.addEventListener('click', hapusdata);

    // function hapusdata(){
    //     Swal.fire({
    //         title: 'Konfirmasi',
    //         text: "Apakah anda yakin ingin menghapus data ini?",
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Hapus Data'
    //         }).then((result) => {
    //             if (result.value) {
    //                 Swal.fire(
    //                 'Data Terhapus!',
    //                 'Data berhasil di hapus',
    //                 'success'
    //             )
    //         }
    //     });
    // }
    
</script>
@endsection