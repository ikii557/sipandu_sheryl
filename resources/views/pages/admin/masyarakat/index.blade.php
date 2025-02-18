@extends('layouts.layoutadmin')

@section('content')
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

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Masyarakat</h3>
                    <a href="tambah_masyarakat" class="btn float-right btn-outline-secondary btn-md">
                        <li class="fa fa-plus"></li> Add Data Masyarakat
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Role</th>
                                <th>Alamat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataMasyarakat as $masyarakat)
                            @if($masyarakat->role === 'masyarakat')
                                
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$masyarakat->nik}}</td>
                                <td>{{$masyarakat->nama_lengkap}}</td>
                                <td>{{$masyarakat->username}}</td>
                                <td>{{$masyarakat->role}}</td>
                                <td>{{$masyarakat->alamat}}</td>
                                <td>
                                    <!-- Tombol Edit -->
                                    <a href="/edit_masyarakat/{{$masyarakat->id}}" class="btn btn-warning btn-xs" title="Edit Masyarakat">
                                        <li class="fa fa-edit"></li>
                                    </a>
                                    <!-- Tombol Detail -->
                                    <a href="" class="btn btn-primary btn-xs" title="Detail Masyarakat">
                                        <li class="fa fa-list"></li>
                                    </a>
                                    <!-- Tombol Delete -->
                                    <form action="/destroy_masyarakat/{{ $masyarakat->id }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete Masyarakat">
                                            <li class="fa fa-trash"></li>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
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
