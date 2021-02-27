@extends('layouts.adminlayouts')

@section('title', 'Daftar Siswa - Sistem Pendataan Siswa')

@section('header-text', 'Daftar Siswa')

@section('main-content')
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Daftar Siswa</h3>
    <div class="card-tools">
      <a href="{{ route('dashboard') }}" class="btn btn-info">Kembali</a>
    </div>
  </div>
  <div class="card-body">
    <table id="example" class="display col-sm-4 col-lg-12" style="">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>NISN</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Kelas</th>
                <th>Status</th>
                @if ($users->level == 'admin')
                <th>Kelola</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($daftarsiswa as $siswa)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $siswa->nama_lengkap }}</td>
                <td>{{ $siswa->nip_nisn }}</td>
                <td>{{ $siswa->jenis_kelamin }}</td>
                <td>{{ $siswa->telepon }}</td>
                @if($siswa->kelas_id == null)
                <td>Belum ada Kelas</td>
                @endif
                @if($siswa->kelas_id)
                <td>{{ $siswa->kelas->kelas }}</td>
                @endif
                <td>{{ $siswa->siswa_status }}</td>
                @if ($users->level == 'admin')
                <td class="text-center d-flex">
                    <a href="{{ route('edit-siswa', $siswa->id) }}" class="btn btn-info mx-1">Edit</a>
                    <a href="{{ route('biodata-siswa', $siswa->id) }}" class="btn btn-success mx-1">Selengkapnya</a>
                    <form action="{{ route('hapus-siswa', $siswa->id) }}" method="POST">
                      @csrf
                      <input type="hidden" value="{{ $siswa->id }}" name="idsiswa">
                      <button id="tombolhapus" type="submit" class="btn btn-danger mx-1">Hapus</button>
                    </form>
                </td>
                @endif
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

    function alertConfirm(){
      Swal.fire({
        title: 'Konfirmasi',
        text: "Apakah anda yakin ingin menghapus data ini?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!'
        }).then((result) => {
          if (result.isConfirmed) {
            Swal.fire(
            'Di hapus',
            'Data berhasil di hapus',
            'success'
            )
          }
      })
    }
</script>
@endsection
