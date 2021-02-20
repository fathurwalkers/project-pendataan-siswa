@extends('layouts.adminlayouts')

@section('title', 'Informasi Detail Pengajar - Sistem Pendataan Siswa')

@section('header-text', 'Informasi Detail Pengajar')

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
      <div class="row">
              <ul>
                  <li class="list-pengajar">Nama Pengajar : Irwan</li>
                  <li class="list-pengajar">Kelas : VII B </li>
              </ul>
      </div>
    <table id="example" class="display" style="width:100%">
        <p>Siswa yang mengambil kelas ini</p>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Siswa</th>
                <th>NISN</th>
                <th>Status</th>
                <th>Kelola</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $item)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->nip_nisn }}</td>
                <td>{{ $item->siswa_status }}</td>
                <td>
                    <a href="#" class="btn btn-primary">Selengkapnya</a>
                </td>
            </tr>
            @endforeach
    </table>
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
