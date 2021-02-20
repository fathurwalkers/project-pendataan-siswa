@extends('layouts.adminlayouts')

@section('title', 'List Data Siswa pada Kelas ini - Sistem Pendataan Siswa')

@section('header-text', 'List Data Siswa pada Kelas ini')

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
                <th>Nama Siswa</th>
                <th>NISN</th>
                <th>Kelas</th>
                {{-- <th>Kode Kelas</th> --}}
                <th>Kelola</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswa as $a)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $a->nama_lengkap }}</td>
                <td>{{ $a->nip_nisn }}</td>
                <td>{{ $a->kelas->kelas }}</td>
                {{-- <td class="text-center">{{ $a->kode_kelas }}</td> --}}
                <td class="text-center">  
                    <a href="{{ route('biodata-siswa', $a->id) }}" class="btn btn-success">Selengkapnya</a>   
                </td>
            </tr>
            @endforeach
        </tbody>
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
