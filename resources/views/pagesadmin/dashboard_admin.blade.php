@extends('layoutsadmin.app')
@section('contentadmin')
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Dashboard</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Index</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Masyarakat</span>
                                    <span class="info-box-number">
                                        10
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>

                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-red elevation-1"><i class="fa fa-retweet"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Laporan Pengaduan</span>
                                    <span class="info-box-number">
                                        1.000
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-green elevation-1"><i class="fa fa-envelope"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Laporan Baru</span>
                                    <span class="info-box-number">
                                        200
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    Data Laporan Masuk
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>nama masayrakat</th>
                                                <th>kategori</th>
                                                <th>Tgl Pengaduan</th>
                                                <th>isi Pengaduan</th>
                                                <th>foto</th>
                                                <th>status</th>
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
                                                            <img src="{{ Storage::url($pengaduan->foto) }}" alt="Foto Pengaduan" width="50">
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
                                                            <span class="badge bg-warning">
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
                                                    @unless(auth()->user()->role == 'petugas')
                                                    <td>
                                                        <!-- Tombol Edit -->
                                                        {{-- <a href="/edit_laporan/{{ $pengaduan->id }}" class="btn btn-sm btn-warning mt-1">E</a> --}}
                                                
                                                        <!-- Form Penghapusan -->
                                                        <form id="delete-form-{{ $pengaduan->id }}" action="{{ route('destroy_pengaduan', $pengaduan->id) }}" method="POST" style="display:inline-block;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDeletion({{ $pengaduan->id }})">
                                                                Hapus
                                                            </button>
                                                        </form>
                                                    </td>
                                                @endunless
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
            </section>
@endsection
