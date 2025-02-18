@extends('layoutsmasyarakat.app')

@section('contentmasyarakat')
<div class="container d-flex align-items-center justify-content-center" style="height: 80vh;">
  <div class="row w-100">
    <div class="col-lg-8 pt-4 pt-lg-0 mx-auto" style="margin-top: 280px;">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title text-center">Form Register</h4>
        </div>
        <div class="card-body">
          <div class="form form-group">
            <label for="textNik">NIK</label>
            <input type="text" name="textNik" class="form form-control" placeholder="contoh : 3201234556777">
          </div>
          <div class="form form-group mt-3">
            <label for="textNama">Nama</label>
            <input type="text" name="textNama" class="form form-control" placeholder="Nama Lengkap">
          </div>
          <div class="form form-group mt-3">
            <label for="selectJenisKelamin">Jenis Kelamin</label>
            <select name="selectJenisKelamin" class="form form-control">
              <option value="Laki-laki">Laki-laki</option>
              <option value="Perempuan">Perempuan</option>
            </select>
          </div>
          <div class="form form-group mt-3">
            <label for="textNomorTelepon">Nomor Telepon</label>
            <input type="text" name="textNomorTelepon" class="form form-control" placeholder="contoh : +62388584494949">
          </div>

          <div class="form form-group">
            <label for="textAlamat">Alamat</label>
            <input type="text" name="textAlamat" class="form form-control" placeholder="alamat lengkap">
          </div>
          <div class="form form-group mt-3">
            <label for="textEmail">Email</label>
            <input type="email" name="textEmail" class="form form-control" placeholder="contoh : apm@gmail.com">
          </div>
          <div class="form form-group mt-3">
            <label for="textPassword">Password</label>
            <input type="password" name="textPassword" class="form form-control">
          </div>

          <button type="button" class="btn btn-success btn-md mt-4 btn-block"><i class="bi bi-card-checklist"></i> Register</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
