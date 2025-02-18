@extends('layoutsmasyarakat.app')

@section('contentmasyarakat')
<div class="container d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="row w-100">
      <div class="col-lg-4 pt-4 pt-lg-0 mx-auto">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title text-center">Login</h4>
          </div>
          <div class="card-body">
            <div class="form form-group">
              <label for="textEmail">Email</label>
              <input type="email" class="form form-control" id="textEmail">
            </div>
            <div class="form form-group">
              <label for="textPasswordLogin">Password</label>
              <input type="password" class="form form-control" id="textPasswordLogin">
            </div>
            <a href="/pengaduanku" class="btn btn-success btn-md mt-3 d-flex justify-content-center"><i class="icon bi bi-lock"></i> Login</a>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
