@extends('layouts.layoutadmin')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detail Laporan Masuk</h3>
                    <a href="/laporanmasuk" class="btn float-right btn-outline-warning btn-md">
                        <li class="fa fa-undo"></li> Kembali
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="judulPengaduan">Judul</label>
                                </div>
                                <div class="col-sm-6">
                                    : {{ $laporan->judul }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="judulPengaduan">Kategori Pengaduan</label>
                                </div>
                                <div class="col-sm-6">
                                    : {{ $laporan->kategoriPengaduan->namakategori }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="tanggalLaporan">Tanggal Laporan</label>
                                </div>
                                <div class="col-sm-6">
                                    : {{ $laporan->tanggalpengaduan->format('d F Y') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="namaPelapor">NIK Pelapor</label>
                                </div>
                                <div class="col-sm-6">
                                    : {{ $laporan->user ? $laporan->user->nik : 'Tidak Diketahui' }} <!-- Menampilkan NIK melalui relasi user -->
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="namaPelapor">Nama Pelapor</label>
                                </div>
                                <div class="col-sm-6">
                                    : {{ $laporan->user ? $laporan->user->name : 'Tidak Diketahui' }}
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="statusLaporan">Status</label>
                                </div>
                                <div class="col-sm-6">
                                    <form action="{{ route('laporanmasuk.updateStatus', $laporan->id) }}" method="POST">
                                        @csrf
                                        @method('PUT') <!-- Use PUT method since it's an update request -->
                                        <select name="status" id="select" class="form-control">
                                            <option value="New" {{ $laporan->status == 'New' ? 'selected' : '' }}>New</option>
                                            <option value="Proses" {{ $laporan->status == 'Proses' ? 'selected' : '' }}>Proses</option>
                                            <option value="Selesai" {{ $laporan->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                            <option value="Di Tolak" {{ $laporan->status == 'Di Tolak' ? 'selected' : '' }}>Di Tolak</option>
                                        </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <img src="{{ asset('storage/'.$laporan->image_path) }}" alt="Image" class="img-fluid" style="border-radius: 10px; width: 100%; margin-top: 10px;">
                        </div>
                    </div>
                    <div class="col-md-12 mt-3">
                            @csrf
                            @method('PUT') 
                            <button type="submit" class="btn btn-outline-secondary btn-md btn-block">
                                <i class="fa fa-retweet"></i> Update Status
                            </button>
                        </form>                        
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <img src="{{ asset('storage/'.$laporan->image_path) }}" alt="" class="img img-fluid"
                                style="border-radius: 10px;">
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <p class="post">
                                {{ $laporan->deskripsi }}
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="post clearfix">
                            <div class="user-block">
                                <img class="img-circle img-bordered-sm" src="/dist/img/default-150x150.png" alt="User Image">
                                <span class="username">
                                    <a href="#">Kresna Dermawan</a>
                                </span>
                                <span class="description">di tanggapi tanggal 25 Oktober 2024</span>
                            </div>
                            <p>
                                {{ $laporan->tanggapan }}
                            </p>
                            <form class="form-horizontal">
                                <div class="input-group input-group-sm mb-0">
                                    <input class="form-control form-control-sm" placeholder="Isi Tanggapan" style="flex-grow: 1;">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-danger">Kirim Tanggapan</button>
                                    </div>
                                </div>
                            </form>
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
