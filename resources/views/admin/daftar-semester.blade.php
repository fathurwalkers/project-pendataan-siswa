@extends('layouts.adminlayouts')

@section('title', 'Daftar Semester - Sistem Pendataan Siswa')

@section('header-text', 'Daftar Semester')

@section('main-content')
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Title</h3>
    <div class="card-tools">
      <a href="{{ route('dashboard') }}" class="btn btn-info">Kembali</a>
    </div>
  </div>
  <div class="card-body">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Tahun Ajaran</th>
                <th>Kepala Sekolah</th>
                {{-- <th>Kode Semester</th> --}}
                <th>Status</th>
                {{-- <th>Kelola</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($semester as $smtr)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $smtr->tahun_ajaran }}</td>
                <td>{{ $smtr->nip_kepsek }}</td>
                {{-- <td>{{ $smtr->kode_semester }}</td> --}}
                <td>{{ $smtr->status_semester }}</td>
                {{-- <td class="text-center d-flex">
                    <a href="#" class="btn btn-info mx-1">Edit</a>
                    <a href="#" class="btn btn-success mx-1">Selengkapnya</a>
                    <form action="#" method="POST">
                      @csrf
                      <input type="hidden" value="{{ $siswa->id }}" name="idsiswa">
                      <button id="tombolhapus" type="submit" class="btn btn-danger mx-1">Hapus</button>
                    </form>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->
@endsection

@section('after-script')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });

    // function alertConfirm(){
    //   Swal.fire({
    //     title: 'Konfirmasi',
    //     text: "Apakah anda yakin ingin menghapus data ini?",
    //     icon: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#3085d6',
    //     cancelButtonColor: '#d33',
    //     confirmButtonText: 'Ya, hapus!'
    //     }).then((result) => {
    //       if (result.isConfirmed) {
    //         Swal.fire(
    //         'Di hapus',
    //         'Data berhasil di hapus',
    //         'success'
    //         )
    //       }
    //   })
    // }
</script>
@endsection