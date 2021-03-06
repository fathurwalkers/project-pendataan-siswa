@extends('layouts.adminlayouts')

@section('title', 'Daftar Mata Pelajaran - Sistem Pendataan Siswa')

@section('header-text', 'Daftar Mata Pelajaran')

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
                <th>Mata Pelajaran</th>
                {{-- <th>Kode Mata Pelajaran</th> --}}
                @if ($users->level == 'admin')
                <th>Kelola</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($matapelajaran as $mapel)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $mapel->nama_matapelajaran }}</td>
                {{-- <td class="text-center">{{ $mapel->kode_matapelajaran }}</td> --}}
                @if ($users->level == 'admin')
                <td class="text-center btn-group">
                    <a href="{{ route('edit-matapelajaran', $mapel->id) }}" class="btn btn-info">Edit</a>    
                    {{-- <a href="#" class="btn btn-success">Detail</a>     --}}
                    <form action="{{ route('hapus-matapelajaran', $mapel->id) }}" method="POST">
                      @csrf
                      <input type="hidden" value="{{ $mapel->id }}" name="idmatapelajaran">
                      <button id="tombolhapus" type="submit" class="btn btn-danger mx-1">Hapus</button>
                    </form>  
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
