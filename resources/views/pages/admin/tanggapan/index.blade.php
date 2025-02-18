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

                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-warning" style="background-color: #e3e3e3;">
                            <tr>
                                <th>No</th>
                                <th>Pengaduan id</th>
                                <th>Tanggal Tanggapan</th>
                                <th>Tanggapan</th>
                                <th>Nama Petugas</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody style="background-color: #ffffff;">
                            @php $no = 1; @endphp
                            @foreach ($tanggapans as $index => $tanggapan)
                                <tr>
                                    <td>{{ $tanggapans->firstItem() + $index }}</td>
                                    <td>{{ $tanggapan->pengaduan->masyarakat->nama_lengkap ?? 'Tidak Ada Data' }}</td>
                                    <td>{{ $tanggapan->tanggal_tanggapan }}</td>
                                    <td>{{ $tanggapan->tanggapan }}</td>
                                    <td>{{ $tanggapan->petugas->nama_lengkap ?? 'Tidak Ada Data' }}</td>
                                    <td>
                                        <a href="/edit_tanggapan/{{ $tanggapan->id }}" class="btn btn-sm btn-warning">E</a>
                                        <form action="{{ route('tanggapan.destroy', $tanggapan->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus tanggapan ini?')">
                                                H
                                            </button>
                                        </form>
                                        

                                    </td>
                                </tr>
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
