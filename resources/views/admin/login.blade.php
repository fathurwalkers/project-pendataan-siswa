<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Halaman Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/adminlte.min.css') }}">
  <style>
    .icheck-primary {
      display: none;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="#" class="h1"><b>LOGIN</b></a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Masuk ke Sistem Pendataan Siswa</p>
        @if (session('status_fail'))
            <div class="alert alert-danger">
                {{ session('status_fail') }}
            </div>
        @endif
        @if (session('password_fail'))
            <div class="alert alert-danger">
                {{ session('password_fail') }}
            </div>
        @endif
        <form action="{{ route('postLogin') }}" method="POST">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Ingat saya
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

        {{-- <p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p> --}}
        {{-- <p class="mb-0">
          <a href="{{ route('register') }}" class="text-center badge badge-info">Daftar Akun Baru</a>
        </p> --}}
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="{{ asset('vendor/adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
</body>

</html>