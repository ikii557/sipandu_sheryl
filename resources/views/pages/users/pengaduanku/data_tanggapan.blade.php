@extends('layouts.layoutuser')

@section('contentuser')
<section class="inner-page">
    <div class="container table-responsive">
        <a href="/pengaduanku" class="btn btn-warning btn-md"> Kembali</a>
        <hr>
        
        <div class="row">
            <div class="col-md-12">
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
                        @foreach ($pengaduans as $index => $pengaduan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pengaduan->masyarakat->nama_lengkap ?? 'Tidak Ada Data' }}</td>
                                <td>{{ $pengaduan->kategori->nama_kategori ?? 'Tidak Ada Data' }}</td>
                                <td>{{ $tanggapans->first()->tanggal_tanggapan ?? 'Belum ada tanggapan' }}</td>
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
        </div>
    </div>
</section>
@endsection
