@extends('layoutsadmin.app')
@section('contentadmin')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Masuk</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Laporan Masuk</a></li>
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
                    <h3 class="card-title">Data Laporan Masuk</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 float-right">
                            <label for="selectFilter">Filter Berdasarkan status</label>
                            <select name="selectFilter" id="select Filter" class="form form-control">
                                <option value="">-- Filter Status --</option>
                                <option value="">New</option>
                                <option value="">Process</option>
                                <option value="">Selesai</option>
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>nama masyarakat</th>
                                        <th>Tanggal Pengaduan</th>
                                        <th>Judul Pengaduan</th>
                                        <th>Nama Pengadu</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                                @foreach ($pengaduans as $index => $pengaduan)
                                                    <tr>
                                                        <td>{{ $index + 1 }}</td>
                                                        <td>{{ $pengaduan->masyarakat->nama_lengkap ?? 'Tidak Ada Data' }}</td>
                                                        <td>{{ $pengaduan->kategori->nama_kategori ?? 'Tidak Ada Data' }}</td>
                                                        <td>{{ $pengaduan->tanggal_pengaduan }}</td>
                                                        <td>{{ $pengaduan->isi_pengaduan }}</td>
                                                        <td>
                                                        @if ($pengaduan->foto)
                                                            <img src="{{ Storage::url($pengaduan->foto) }}" alt="Foto Pengaduan" width="100">
                                                        @else
                                                            Tidak ada foto
                                                        @endif
                                                        </td>

                                                        <td>
                                                        @if(in_array($pengaduan->status, ['selesai', 'ditolak']))
                                                            @if($pengaduan->status == 'ditolak' && auth()->user()->role == 'admin')
                                                                <a href="/tambah_tanggapan/{{$pengaduan->id}}">
                                                                    <span class="badge bg-danger">
                                                                        {{ ucfirst($pengaduan->status) }}
                                                                    </span>
                                                                </a>
                                                            @else
                                                                <span class="badge {{ $pengaduan->status == 'selesai' ? 'bg-success' : 'bg-danger' }}">
                                                                    {{ ucfirst($pengaduan->status) }}
                                                                </span>
                                                            @endif
                                                        @elseif($pengaduan->status == 'diproses' && auth()->user()->role == 'admin')
                                                            <a href="/tambah_tanggapan/{{$pengaduan->id}}">
                                                                <span class="badge bg-info">
                                                                    {{ ucfirst($pengaduan->status) }}
                                                                </span>
                                                            </a>
                                                        @else
                                                            {{-- Default status tanpa respons --}}
                                                            <a href="/tambah_tanggapan/{{$pengaduan->id}}">
                                                                <span class="badge bg-warning">
                                                                    belum ada respon
                                                                </span>
                                                            </a>

                                                        @endif





                                                        </td>
                                                        
                                                        <td >
                                                            
                                                            @unless(auth()->user()->role == 'petugas')
                                                            <!-- Link Penghapusan -->
                                                            <form id="delete-form-{{ $pengaduan->id }}" action="{{ route('destroy_pengaduan', $pengaduan->id) }}" method="POST" style="display:inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDeletion({{ $pengaduan->id }})">
                                                                    Hapus
                                                                </button>
                                                            </form>

                                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                                    <script>
                                                        function confirmDeletion(pengaduanId) {
                                                            Swal.fire({
                                                                title: 'Apakah Anda yakin?',
                                                                text: "Data pengaduan ini akan dihapus secara permanen!",
                                                                icon: 'warning',
                                                                showCancelButton: true,
                                                                confirmButtonColor: '#d33',
                                                                cancelButtonColor: '#3085d6',
                                                                confirmButtonText: 'Ya, hapus!',
                                                                cancelButtonText: 'Batal'
                                                            }).then((result) => {
                                                                if (result.isConfirmed) {
                                                                    document.getElementById('delete-form-' + pengaduanId).submit();
                                                                }
                                                            });
                                                        }

                                                        @if(session('success'))
                                                            // Show success notification at the center
                                                            Swal.fire({
                                                                icon: 'success',
                                                                title: 'Berhasil!',
                                                                text: "{{ session('success') }}",
                                                                timer: 3000,
                                                                showConfirmButton: false,
                                                                position: 'center' // Alert positioned at the center
                                                            });
                                                        @endif
                                                    </script>


                                                        </td>
                                                        @endunless
                                                    </tr>
                                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
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