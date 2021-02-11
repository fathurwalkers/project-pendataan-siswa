@extends('layouts.adminlayouts')

@section('title', 'Daftar Kelas - Sistem Pendataan Siswa')

@section('header-text', 'Daftar Kelas')

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
                <th>Kelas</th>
                <th>Kode Kelas</th>
                <th>Kelola</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kelas as $a)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $a->kelas }}</td>
                <td class="text-center">{{ $a->kode_kelas }}</td>
                <td class="text-center">
                    <a href="#" class="btn btn-info">Edit</a>    
                    <a href="#" class="btn btn-success">Detail</a>    
                    <a href="#" class="btn btn-danger">Hapus</a>    
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
