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
                    <h3 class="card-title">Data Petugas</h3>
                    <a href="tambah_pegawai" class="btn float-right btn-outline-secondary btn-md">
                        <li class="fa fa-plus"></li> Add Data Pegawai
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
                                <th>Jabatan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPegawai as $pegawai)
                            @if($pegawai->role === 'petugas')
                                
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pegawai->nik }}</td>
                                <td>{{ $pegawai->nama_lengkap }}</td>
                                <td>{{ $pegawai->role }}</td>
                                <td>
                                    <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-warning btn-xs" title="Edit Pegawai">
                                        <li class="fa fa-edit"></li>
                                    </a>
                                
                                    <!-- Tombol untuk menghapus pegawai -->
                                    <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete Pegawai">
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
