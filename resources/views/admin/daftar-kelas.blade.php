@extends('layouts.adminlayouts')

@section('title', 'Daftar Kelas - Sistem Pendataan Siswa')

@section('header-text', 'Daftar Kelas')

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
                <th>Kelas</th>
                {{-- <th>Kode Kelas</th> --}}
                @if ($users->level == 'admin')
                <th>Kelola</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $a)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $a->kelas }}</td>
                {{-- <td class="text-center">{{ $a->kode_kelas }}</td> --}}
                @if ($users->level == 'admin')
                <td class="text-center">  
                    <a href="{{ route('daftar-siswa-kelas', $a->id) }}" class="btn btn-success">Selengkapnya</a>   
                </td>
                @endif
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
