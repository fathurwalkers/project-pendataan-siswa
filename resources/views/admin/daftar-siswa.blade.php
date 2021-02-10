@extends('layouts.adminlayouts')

@section('title', 'Daftar Siswa - Sistem Pendataan Siswa')

@section('header-text', 'Daftar Siswa')

@section('main-content')
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Title</h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
        <i class="fas fa-minus"></i>
      </button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
        <i class="fas fa-times"></i>
      </button>
    </div>
  </div>
  <div class="card-body">
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Jenis Kelamin</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Kelola</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarsiswa as $siswa)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $siswa->nama_lengkap }}</td>
                <td>{{ $siswa->nip_nisn }}</td>
                <td>{{ $siswa->jenis_kelamin }}</td>
                <td>{{ $siswa->alamat }}</td>
                <td>{{ $siswa->telepon }}</td>
                <td>{{ $siswa->siswa_kelas }}</td>
                <td>{{ $siswa->siswa_status }}</td>
                <td class="text-center">
                    <a href="#" class="btn btn-info">Edit</a>
                    <a href="#" class="btn btn-success">Lihat Detail</a>
                    <a href="#" class="btn btn-danger">Hapus</a>
                </td>
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
    } );
</script>
@endsection
