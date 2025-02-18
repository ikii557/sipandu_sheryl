@extends('layoutsadmin.app')
@section('contentadmin')
@if (session('success'))
    <div class="alert alert-success" id="alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" id="alert-error">
        {{ session('error') }}
    </div>
@endif

<script>
    // Hilangkan notifikasi setelah 3 detik (3000 ms)
    setTimeout(function() {
        let successAlert = document.getElementById('alert-success');
        let errorAlert = document.getElementById('alert-error');

        if (successAlert) {
            successAlert.style.transition = "opacity 0.5s";
            successAlert.style.opacity = "0";
            setTimeout(() => successAlert.remove(), 500);
        }

        if (errorAlert) {
            errorAlert.style.transition = "opacity 0.5s";
            errorAlert.style.opacity = "0";
            setTimeout(() => errorAlert.remove(), 500);
        }
    }, 3000);
</script>

    <!-- Content Header (Page header) -->
    <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Pegawai</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Pegawai</a></li>
                                <li class="breadcrumb-item active">Index</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card" >
                            <div class="card-header"  style="background-color: #ffffff;">
                                <h3 class="card-title">Data Pegawai</h3>
                                <a href="tambah_pegawai" class="btn float-right btn-outline-secondary btn-md">
                                    <li class="fa fa-plus"></li> Add Data Pegawai
                                </a>
                            </div>
                            <div class="card-body" style="background-color: #ffffff;">
                                <div class="card">
                                    <div>
                                    <table id="example1" class="table table-bordered table-striped" >
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>NIK</th>
                                                <th>Nama</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Username</th>
                                                <th>No Telepon</th>
                                                <th>Alamat</th>
                                                <th>Jabatan</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $no = 1; @endphp
                                            @foreach ($petugass as $petugas)
                                                @if ($petugas->role === 'petugas')
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $petugas->nik }}</td>
                                                        <td>{{ $petugas->nama_lengkap }}</td>
                                                        <td>{{ $petugas->jenis_kelamin }}</td>
                                                        <td>{{ $petugas->username }}</td>
                                                        <td>{{ $petugas->no_telepon }}</td>
                                                        <td>{{ $petugas->alamat }}</td>
                                                        <td>{{ $petugas->role }}</td>
                                                        @unless(auth()->user()->role == 'petugas' ?? 'admin')
                                                        <td>
                                                            <a href="/edit_pegawai/{{$petugas->id}}" class="btn btn-warning btn-sm">Edit</a>
                                                            <a href="javascript:void(0);" class="btn btn-danger"
                                                                data-toggle="tooltip"
                                                                data-placement="top"
                                                                title="Hapus"
                                                                onclick="confirmDeletion({{ $petugas->id }});">
                                                                <i class="fa fa-close color-danger">Hapus</i>
                                                            </a>
                                                        </td>
                                                        @endunless
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
@endsection
