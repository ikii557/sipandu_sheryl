@extends('layouts.layoutadmin')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card bg-light">
                <div class="card-header text-muted border-bottom-0">
                    NIK : {{ Auth::user()->nik }} <!-- Menampilkan NIK -->
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-7">
                            <h2 class="lead"><b>{{ Auth::user()->nama_lengkap }}</b></h2> <!-- Menampilkan nama profiles -->
                            <p class="text-muted text-sm"><b>Jenis Kelamin : </b> {{  Auth::user()->jenis_kelamin }}</p> <!-- Jenis kelamin -->
                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                <li class="small"><span class="fa-li"><i
                                            class="fas fa-lg fa-building"></i></span> Alamat : {{ Auth::user()->alamat }}</li> <!-- Alamat -->
                                <li class="small"><span class="fa-li"><i
                                            class="fas fa-lg fa-phone"></i></span> Phone : {{ Auth::user()->no_telepon }}</li> <!-- Telepon -->
                                <li class="small"><span class="fa-li"><i
                                            class="fas fa-lg fa-envelope"></i></span> Email : {{ Auth::user()->username }}</li> <!-- Email -->
                                <li class="small"><span class="fa-li"><i
                                            class="fas fa-lg fa-briefcase"></i></span> Jabatan : {{ Auth::user()->role }}</li> <!-- Jabatan -->
                            </ul>
                        </div>
                        <div class="col-5 text-center">
                            <img src="{{ $profiles->foto ? Storage::url('pengaduan/'.$profiles->foto) : asset('default-image.jpg') }}" alt="Foto Pengaduan" class="img-circle img-fluid">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        {{-- <a href="{{ route('admin.profile.edit') }}" class="btn btn-sm btn-primary"> --}}
                            <i class="fas fa-user"></i> Edit Profile
                        </a>
                        
                    </div>
                </div>
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection
