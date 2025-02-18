@extends('layouts.layoutadmin')

@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Form Add Data Petugas</h3>
                    <a href="/pegawai" class="btn float-right btn-outline-warning btn-md">
                        <li class="fa fa-undo"></li> Kembali
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/update_tanggapan/{{ $pengaduan->id }}" method="POST">
                        @csrf
            
                        <div class="row gy-4">
                            <!-- Tanggapan -->
                            <div class="col-12">
                                <label for="tanggapan" class="form-label">Isi Tanggapan</label>
                                <textarea class="form-control" name="isi_tanggapan" rows="4">{{ old('isi_tanggapan', $tanggapan->tanggapan ?? '') }}</textarea>
                                @error('isi_tanggapan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
            
                            <!-- Status Pengaduan -->
                            <!-- Status Pengaduan -->
                            <div class="col-12">
                                <label for="status" class="form-label">Status Pengaduan</label>
                                <select class="form-control" name="status" required>
                                <option value="ditolak" {{ $pengaduan->status == 'ditolak' ? 'selected' : '' }}>ditolak</option>
                                    <option value="0" {{ $pengaduan->status == '0' ? 'selected' : '' }}>Pending</option>
                                    <option value="diproses" {{ $pengaduan->status == 'diproses' ? 'selected' : '' }}>Diproses</option>
                                    <option value="selesai" {{ $pengaduan->status == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                </select>
                                @error('status')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
            
            
                            <!-- Tombol Submit -->
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary">Kirim Tanggapan & Perbarui Status</button>
                            </div>
                        </div>
                    </form>
            

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
