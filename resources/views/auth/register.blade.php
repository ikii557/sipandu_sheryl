<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>APM | register</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Si</b>Pandu</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="/store/register" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label><strong>NIK</strong></label>
                                    <input name="nik" value="{{old('nik')}}" type="text"  class="form-control" placeholder="masukan nik">
                                    @error('nik')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>
                                    <div class="form-group">
                                        <label><strong>Nama Lengkap</strong></label>
                                        <input name="nama_lengkap" value="{{ old('nama_lengkap') }}" type="text" class="form-control" placeholder="Masukan Nama Lengkap">
                                        @error('nama_lengkap')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Jenis Kelamin</strong></label>
                                        <select name="jenis_kelamin" class="form-control">
                                            <option value="">-- Pilih Jenis Kelamin --</option>
                                            <option value="laki-laki" {{ old('jenis_kelamin') == 'laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="perempuan" {{ old('jenis_kelamin') == 'perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        @error('jenis_kelamin')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Username</strong></label>
                                        <input name="username" value="{{ old('username') }}" type="text" class="form-control" placeholder="Masukan Username">
                                        @error('username')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Password</strong></label>
                                        <input name="password" type="password" class="form-control" placeholder="Masukan Password">
                                        @error('password')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>No Telepon</strong></label>
                                        <input name="no_telepon" value="{{ old('no_telepon') }}" type="text" class="form-control" placeholder="Masukan No Telepon">
                                        @error('no_telepon')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Alamat</strong></label>
                                        <textarea name="alamat" class="form-control" placeholder="Masukan Alamat">{{ old('alamat') }}</textarea>
                                        @error('alamat')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label><strong>Role</strong></label>
                                        <select name="role" class="form-control">
                                            <option value="">-- Pilih Role --</option>
                                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                            <option value="petugas" {{ old('role') == 'petugas' ? 'selected' : '' }}>Petugas</option>
                                            <option value="masyarakat" {{ old('role') == 'masyarakat' ? 'selected' : '' }}>Masyarakat</option>
                                        </select>
                                        @error('role')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block mt-2">REGISTER</button>
                            </div>
                        </form>


<div class="new-account mt-3">
    <p>Sudah punya akun? <a class="text-primary" href="/login">Login</a></p>
</div>

            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>

</body>

</html>



