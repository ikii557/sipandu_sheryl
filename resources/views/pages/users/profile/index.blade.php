@extends('layouts.layoutuser')

@section('contentuser')
<section>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <img src="/assets/img/team/team-1.jpg" alt="" width="200px" class="img-profile">
            </div>
            <div class="col-lg-9">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                            data-bs-target="#home" type="button" role="tab" aria-controls="home"
                            aria-selected="true">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                            type="button" role="tab" aria-controls="profile" aria-selected="false">Ubah Password</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <form action="{{ route('update.profile') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form form-group col-md-6">
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik', $user->nik) }}" required>
                                        <label for="nik">NIK</label>
                                        @error('nik')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating my-3">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                        <label for="name">Nama</label>
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating">
                                        <select name="selectJenisKelamin" id="selectJenisKelamin" class="form form-control">
                                            <option value="Laki-laki" {{ $user->jeniskelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                            <option value="Perempuan" {{ $user->jeniskelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        @error('jenis_kelamin')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating my-3">
                                        <input type="text" name="notelpon" class="form-control" id="notelpon" value="{{ old('notelpon', $user->notelpon) }}" required>
                                        <label for="notelpon">Nomor Telepon</label>
                                        @error('notelpon')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating my-3">
                                        <textarea class="form-control" placeholder="Leave a comment here" id="alamat" name="alamat" style="height: 100px" required>{{ old('alamat', $user->alamat) }}</textarea>
                                        <label for="alamat">Alamat</label>
                                        @error('alamat')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-floating my-3">
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                        <label for="email">Email</label>
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary position-relative">Perbaharui</button>
                                    <a href="/pengaduanku" class="btn float-right btn-outline-warning btn-md">
                                        <i class="fa fa-undo"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <form action="{{ route('update.password') }}" method="POST">
                            @csrf
                            <div class="form-floating my-3">
                                <input type="password" name="password" id="password" class="form-control" required>
                                <label for="password">Password Baru</label>
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating my-3">
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                                <label for="password_confirmation">Konfirmasi Password</label>
                                @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-floating my-3">
                                <button type="submit" class="btn btn-primary btn-md">Perbaharui Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
