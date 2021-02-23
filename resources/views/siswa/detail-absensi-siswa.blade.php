@extends('layouts.adminlayouts')

@section('title', 'Daftar Informasi Absensi - Sistem Pendataan Guru')

@section('header-text', 'Daftar Informasi Absensi')

@section('main-content')
<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Daftar Informasi Absensi Siswa</h3>
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
    {{-- <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Kelas</th>
                <th>Nama Siswa</th>
                <th>Kode Kelas</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detail_kelas as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->kelas->kelas }}</td>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->kelas->kode_kelas }}</td>
            </tr>
            @endforeach
    </table> --}}
  </div>
  <!-- /.card-body -->
  {{-- <div class="card-footer">
    Footer Section
  </div> --}}
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
