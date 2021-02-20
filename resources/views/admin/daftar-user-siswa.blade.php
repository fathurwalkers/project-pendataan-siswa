@extends('layouts.adminlayouts')

@section('title', 'Daftar Informasi User Siswa - Sistem Pendataan Siswa')

@section('header-text', 'Daftar Informasi User Siswa')

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
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Password</th>
                <th>Role Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user_siswa as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->detail->nama_lengkap }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->password }}</td>
                <td>{{ $item->detail->role_status }}</td>
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
