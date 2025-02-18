<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- FontAwesome CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<title>SIPANDU | Register Masyarakat</title>

<style>
    .login-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 110vh;
        padding-left: 23%;
        padding-right: 10%;
    }

    .card {
        width: 100%;
        max-width: 500px;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .btn {
        padding: 8px 16px;
        font-size: 12px;
        width: 100%;
        border-radius: 20px;
        background-color: #28a745;
        color: #fff;
    }

    .btn:hover {
        background-color: #218838;
    }

    .error-message {
        color: red;
        font-size: 12px;
        margin-top: 5px;
    }
</style>

<div class="container login-container">
    <div class="row w-100">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Form Register</h4>
                </div>
                <div class="card-body">
                    <!-- Form Register -->
                    <form action="/store/register" method="POST">
                        @csrf
                        
                        <!-- Input NIK -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                            <input type="text" class="form-control" placeholder="NIK" name="nik" value="{{ old('nik') }}" required>
                        </div>
                        @error('nik')
                            <div class="error-message">{{ $message }}</div>
                        @enderror

                        <!-- Input Nama -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" value="{{ old('name') }}" required>
                        </div>
                        @error('name')
                            <div class="error-message">{{ $message }}</div>
                        @enderror

                        <!-- Input Jenis Kelamin -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-venus-mars"></i></span>
                            <select name="jeniskelamin" class="form-control" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                        @error('jeniskelamin')
                            <div class="error-message">{{ $message }}</div>
                        @enderror

                        <!-- Input Alamat -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="{{ old('alamat') }}" required>
                        </div>
                        @error('alamat')
                            <div class="error-message">{{ $message }}</div>
                        @enderror

                        <!-- Input Nomor Telepon -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-phone-alt"></i></span>
                            <input type="text" class="form-control" placeholder="Nomor Telepon" name="notelpon" value="{{ old('notelpon') }}" required>
                        </div>
                        @error('notelpon')
                            <div class="error-message">{{ $message }}</div>
                        @enderror

                        <!-- Input Email -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required>
                        </div>
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror

                        <!-- Input Password -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>
                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror

                        <!-- Tombol Register -->
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn">
                                    <i class="fa fa-user-plus"></i> Register
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Tautan Login -->
                    <div class="sign-up-text">
                        <p>Sudah punya akun? <a href="/login">Login di sini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
