@extends('layoutsadmin.app')
@section('contentadmin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Masyarakat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Masyarakat</a></li>
                        <li class="breadcrumb-item active">Index</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Masyarakat</h3>
                    <a href="/tambah_masyarakat" class="btn float-right btn-outline-secondary btn-md"><li class="fa fa-plus"></li> Add Data Masyarakat</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIK</th>
                                <th>Nama lengkap</th>
                                <th>jenis kelamin</th>
                                <th>username</th>
                                <th> no telepon</th>
                                <th>role</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tbody>
                                @php $no = 1; @endphp
                                @foreach ($masyarakats as $petugas)
                                    @if ($petugas->role === 'masyarakat')
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $petugas->nik }}</td>
                                            <td>{{ $petugas->nama_lengkap }}</td>
                                            <td>{{ $petugas->jenis_kelamin }}</td>
                                            <td>{{ $petugas->username }}</td>
                                            <td>{{ $petugas->no_telepon }}</td>
                                            <td>{{ $petugas->role }}</td>
                                            <td>{{ $petugas->alamat}}</td>
                                            @unless(auth()->user()->role == 'petugas' ?? 'admin')
                                            <td>
                                                <a href="/edit_masyarakat/{{$petugas->id}}" class="btn btn-warning btn-sm">Edit</a>
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

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
@endsection
