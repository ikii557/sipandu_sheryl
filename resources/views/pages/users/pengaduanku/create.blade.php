@extends('layouts.layoutuser')

@section('contentuser')
<section class="inner-page">
    <div class="container table-responsive">
        <a href="/pengaduanku" class="btn btn-warning btn-md"> Kembali</a>
        <hr>
        
        <div class="row">
            <div class="col-md-8">
                <!-- Menampilkan pesan sukses atau error -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="/store/pengaduan" method="POST" enctype="multipart/form-data">
                    @csrf <!-- Token CSRF untuk keamanan -->
                
                    <!-- Judul Pengaduan -->
                    <div class="form-group">
                        <label for="textJudulPengaduan">Judul Pengaduan</label>
                        <input type="text" class="form-control" id="textJudulPengaduan" name="judul_pengaduan" required>
                    </div>
                
                    <!-- Kategori Pengaduan -->
                    <div class="form-group mt-3">
                        <label for="selectKategoriPengaduan">Kategori Pengaduan</label>
                        <select class="form-control" id="selectKategoriPengaduan" name="kategori_id" required>
                            <option value="">-- Pilih Kategori Pengaduan --</option>
                            @foreach ($kategoris as $kategori)
                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                
                    <!-- Tanggal Pengaduan -->
                    <div class="form-group mt-3">
                        <label for="tanggalPengaduan">Tanggal Pengaduan</label>
                        <input type="date" class="form-control" id="tanggalPengaduan" name="tanggal_pengaduan" required>
                    </div>
                
                    <!-- Isi Pengaduan -->
                    <div class="form-group mt-3">
                        <label for="textIsiPengaduan">Isi Pengaduan</label>
                        <textarea name="isi_pengaduan" class="form-control" cols="30" rows="10" required></textarea>
                    </div>
                
                    <!-- Lampiran Foto -->
                    <div class="form-group mt-3">
                        <label for="filePengaduan">Lampiran Foto Pengaduan</label>
                        <input type="file" name="foto" id="filePengaduan" class="form-control" accept="image/*">
                    </div>
                
                    <!-- Tombol Submit -->
                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
                
                
            </div>
        </div>
    </div>
</section>
    <hr>
<section class="inner-page">

    <div class="container table-responsive">
        
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>nama pengadu</th>
                        <th>Judul Pengaduan</th>
                        <th>Tgl Pengaduan</th>
                        <th>isi pengaduan</th>
                        <th>foto</th>
                        <th>status</th>
                        @unless(auth()->user()->role ?? 'petugas')
                        <th>Aksi</th>
                        @endunless
                    </tr>
                </thead>
                <tbody>
                    <tr>
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
                                    <a href="{{ route('tanggapan_admin', ['id' => $pengaduan->id]) }}">
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
                                <a href="{{ route('tanggapan_admin', ['id' => $pengaduan->id]) }}">
                                    <span class="badge bg-warning">
                                        {{ ucfirst($pengaduan->status) }}
                                    </span>
                                </a>
                            @else
                                {{-- Default status tanpa respons --}}
                                <a href="{{ route('tanggapan_admin', ['id' => $pengaduan->id]) }}">
                                    <span class="badge bg-warning">
                                        belum ada respon
                                    </span>
                                </a>

                            @endif





                            </td>
                            @unless(auth()->user()->role == 'admin')
                            <td>
                            <!-- Tombol Edit -->
                            <a href="/edit_pengaduan/{{ $pengaduan->id }}" class="btn btn-sm btn-warning mt-1">E</a>

                            <!-- Form Penghapusan -->
                            {{-- <form id="delete-form-{{ $pengaduan->id }}" action="{{ route('destroy_pengaduan', $pengaduan->id) }}" method="POST" style="display:inline-block;"> --}}
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger" onclick="confirmDeletion({{ $pengaduan->id }})">
                                H
                            </button>
                            </form>
                            </td>
                            @endunless

                            <!-- SweetAlert -->
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
                            Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: "{{ session('success') }}",
                            timer: 3000,
                            showConfirmButton: false,
                            position: 'top' // Notifikasi muncul di atas
                            });
                            @endif
                            </script>

                        </tr>
                    @endforeach
                    </tr>
                </tbody>
            </table>

    </div>
</section>
@endsection
