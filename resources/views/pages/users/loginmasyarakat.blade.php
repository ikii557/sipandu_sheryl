<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- FontAwesome CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<title>SIPANDU | Login Masyarakat</title>
<!-- Custom CSS -->
<style>
    /* Styling untuk menempatkan form login di tengah dan sedikit geser ke kanan */
    .login-container {
        display: flex;
        justify-content: flex-start;
        /* Aligment kiri */
        align-items: center;
        height: 100vh;
        padding-left: 28%;
        /* Mengatur padding untuk memindahkan form ke kanan */
    }

    .card {
        width: 100%;
        max-width: 400px;
        /* Set lebar maksimum */
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        font-size: 24px;
        font-weight: bold;
        text-align: center;
    }

    .form-control {
        padding: 12px;
        font-size: 16px;
    }

    .btn {
        padding: 12px 20px;
        font-size: 14px;
        width: 100%;
        border-radius: 20px;
        background-color: #28a745;
        /* Latar belakang hijau */
        color: #fff;
        text-align: center;
    }

    .btn:hover {
        background-color: #218838;
        /* Hijau gelap saat hover */
    }

    .input-group-text {
        background-color: #f1f1f1;
        padding: 12px;
        /* Sesuaikan padding ikon */
    }

    .sign-up-text {
        text-align: center;
        margin-top: 15px;
    }

    .sign-up-text a {
        color: #007bff;
        text-decoration: none;
    }

    .sign-up-text a:hover {
        text-decoration: underline;
    }

</style>

<!-- Konten login -->
<div class="container login-container">
    <div class="row w-100">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Login</h4>
                </div>
                <div class="card-body">
                    <!-- Form login -->
                    <form action="{{ url('/authmasyarakat') }}" method="POST">
                        @csrf
                        <!-- Input email dengan ikon -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" placeholder="Email" name="email" required>
                        </div>

                        <!-- Input password dengan ikon -->
                        <div class="input-group mb-3">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Password" name="password" required>
                        </div>

                        <!-- Tombol login -->
                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-outline-secondary btn-block">
                                    <i class="fa fa-sign-in-alt"></i> Sign In
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Tautan Sign Up -->
                    <div class="sign-up-text">
                        <p>Belum punya akun? <a href="registermasyarakat">Daftar di sini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
