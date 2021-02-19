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
                <th>Nama Pengajar</th>
                <th>NIP</th>
                <th>Mata Pelajaran</th>
                <th>Kelas</th>
                {{-- <th>Kode Pengajar</th> --}}
                <th>Tahun Ajaran</th>
                <th>Kelola</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pengajar as $a)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $a->detail->nama_lengkap }}</td>
                <td>{{ $a->nip_guru }}</td>
                <td>{{ $a->matapelajaran->nama_matapelajaran }}</td>
                <td>{{ $a->kelas->kelas }}</td>
                {{-- <td>{{ $a->kode_pengajar }}</td> --}}
                <td>{{ $a->semester->tahun_ajaran }}</td>
                <td class="text-center btn-group">
                    <a href="{{ route('edit-pengajar', $a->id) }}" class="btn btn-info mx-1">Edit</a>
                    <a href="{{ route('detail-pengajar', $a->id) }}" class="btn btn-success mx-1">Selengkapnya</a>
                    <form action="{{ route('hapus-pengajar', $a->id) }}" method="POST">
                        @csrf
                        <input type="hidden" value="{{ $a->id }}" name="idpengajar">
                        <button id="tombolhapus" type="submit" class="btn btn-danger mx-1">Hapus</button>
                      </form>
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
