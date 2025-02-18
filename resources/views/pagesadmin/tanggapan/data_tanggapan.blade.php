@extends('layoutsadmin.app')
@section('contentadmin')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Tanggapan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Data Tanggapan</a></li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Tanggapan</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead >
                            <tr>
                                <th>No</th>
                                <th>Pengaduan id</th>
                                <th>Tanggal Tanggapan</th>
                                <th>Tanggapan</th>
                                <th>Nama Petugas</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                        <form id="delete-tanggapan-form-{{ $tanggapan->id }}" action="/destroy_tanggapan/{{ $tanggapan->id }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDeletion({{ $tanggapan->id }})">
                                                H
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <script>
                        function confirmDeletion(tanggapanId) {
                            Swal.fire({
                                title: 'Apakah Anda yakin?',
                                text: "Tanggapan ini akan dihapus secara permanen!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#d33',
                                cancelButtonColor: '#3085d6',
                                confirmButtonText: 'Ya, hapus!',
                                cancelButtonText: 'Batal'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    document.getElementById('delete-tanggapan-form-' + tanggapanId).submit();
                                }
                            });
                        }

                        @if(session('success'))
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil!',
                                text: "{{ session('success') }}",
                                timer: 3000,
                                showConfirmButton: false,
                                position: 'center'
                            });
                        @endif
                    </script>

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
