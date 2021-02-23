<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
    @yield('after-css')
</head>

<body class="hold-transition sidebar-mini">
    <!-- Site wrapper -->
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ route('dashboard') }}" class="nav-link btn btn-success text-white mx-2">Beranda</a>
                </li>
                {{-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/') }}" class="nav-link btn btn-info text-white mx-2">Homepage</a>
                </li> --}}
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <div class="navbar-search-block">
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="text-white btn btn-danger px-3 mx-2">
                                Logout
                            </button>
                        </form>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ asset('vendor/adminlte') }}/index3.html" class="brand-link">
                <img src="{{ asset('vendor/adminlte') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">SMP</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <div class="fa fa-user img-circle elevation-2"></div>
                    </div>
                    <div class="info">
                        <a href="{{ route('dashboard') }}"
                            class="d-block badge badge-info py-2 px-2">{{ $users->username }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                            @switch($users->level)
                                @case('admin')
                                <li class="nav-item">
                                    <a href="{{ route('dashboard') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Beranda</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('daftar-siswa') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Daftar Siswa</p>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="{{ route('daftar-pengajar') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Daftar Pengajar</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('daftar-guru') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Daftar Guru</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('daftar-matapelajaran') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Daftar Mata Pelajaran</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('daftar-kelas') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Daftar Kelas</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('daftar-semester') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Daftar Semester</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('tambah-pengajar') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Tambah Pengajar</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('tambah-semester') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Tambah Semester</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('tambah-siswa') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Tambah Siswa</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('tambah-guru') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Tambah Guru</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('tambah-matapelajaran') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Tambah Mata Pelajaran</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('daftar-user-siswa') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Daftar User Siswa</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('daftar-user-guru') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Daftar User Guru</p>
                                    </a>
                                </li>
                                    @break

                                @case('kepsek')
                                <li class="nav-item">
                                    <a href="{{ route('dashboard') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Beranda</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('biodata-user', $users->detail->id) }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Lihat Profil</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('daftar-siswa') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Daftar Siswa</p>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="{{ route('daftar-pengajar') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Daftar Pengajar</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('daftar-guru') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Daftar Guru</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('daftar-matapelajaran') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Daftar Mata Pelajaran</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('daftar-kelas') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Daftar Kelas</p>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a href="{{ route('daftar-semester') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Daftar Semester</p>
                                    </a>
                                </li>
                                    @break
                                
                                @case('guru')
                                <li class="nav-item">
                                    <a href="{{ route('dashboard') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Beranda</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('biodata-guru', $users->detail->id) }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Lihat Profil</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('daftar-kelas-guru') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Daftar Kelas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('daftar-input-nilai') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Input Nilai</p>
                                    </a>
                                </li>
                                    @break

                                @case('siswa')
                                <li class="nav-item">
                                    <a href="{{ route('dashboard') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Beranda</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('biodata-siswa', $users->detail->id) }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Lihat Profil</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('siswa-detail-nilai') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Lihat Nilai</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('siswa-detail-absensi') }}" class="nav-link">
                                        <i class="far fa fa-bars nav-icon"></i>
                                        <p>Lihat Riwayat Absensi</p>
                                    </a>
                                </li>
                                    @break

                            @endswitch
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="text-monospace">@yield('header-text')</h1>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                
                @if (session('tidakditemukan'))
                    <div class="alert alert-danger">
                        {{ session('tidakditemukan') }}
                    </div>
                @endif

                @if (session('nilai_null'))
                <div class="alert alert-danger">
                    {{ session('nilai_null') }}
                </div>
                @endif

                @if (session('absensi_null'))
                    <div class="alert alert-danger">
                        {{ session('absensi_null') }}
                    </div>
                @endif

                @if (session('tdkadakelas'))
                    <div class="alert alert-danger">
                        {{ session('tdkadakelas') }}
                    </div>
                @endif

                @yield('main-content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <footer class="main-footer">
            {{-- <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.1.0-rc
      </div>
      <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved. --}}
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('vendor/adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset('vendor/adminlte/dist/js/demo.js') }}"></script>
    <script src="{{ asset('/vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    @yield('after-script')
</body>

</html>
