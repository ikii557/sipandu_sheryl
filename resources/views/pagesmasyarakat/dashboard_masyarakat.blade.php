@extends('layouts.layoutuser')

@section('contentuser')
    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>SIPANDU</h1>
                    <h5>Sistem Pengaduan Terpadu.</h5>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="/assetsuser/img/hero-img.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->

    <section id="pengaduan" class="register" style="background-color: green;">
      <div class="container">
        <div class="row">

          <div class="col-lg-12 pt-4 pt-lg-0">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title text-center">Form Pengaduan</h4>
                </div>
                <section class="inner-page">
                    <div class="container table-responsive">
                        <hr>
                        <p>
                        <div class="row">
                            <form action="/store/laporan" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-4">
                                    <div class="col-md-12">

                                    <input type="hidden" value="{{ auth()->user()->id }}" name="masyarakat_id" id="masyarakat_id">

                                </div>
                                <div class="col-md-12">
                                    <label for="judul_pengaduan" class="form-label fw-semibold">Tanggal Pengaduan</label>
                                    <input type="text" value="{{ old('judul_pengaduan') }}" name="judul_pengaduan" id="judul_pengaduan" class="form-control form-control-lg" placeholder="Masukkan judul pengaduannya" >
                                    @error('judul_pengaduan')
                                        <p class="text-danger small">{{ $message }}</p>
                                    @enderror
                                </div>
                                    <div class="col-md-12">
                                        <label for="kategori_id" class="form-label fw-semibold">Masukan Kategori</label>
                                        <select name="kategori_id" class="form-control" required>
                                            <option value="{{old('kategori_id')}}">-- Pilih Kategori --</option>
                                            @foreach($kategoris as $kategori)
                                                <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                        @error('kategori_id')
                                            <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">

                                    <div class="col-md-12">
                                        <label for="tanggal_pengaduan" class="form-label fw-semibold">Tanggal Pengaduan</label>
                                        <input type="date" value="{{ old('tanggal_pengaduan') }}" name="tanggal_pengaduan" id="tanggal_pengaduan" class="form-control form-control-lg" placeholder="Masukkan tanggal_pengaduan" >
                                        @error('tanggal_pengaduan')
                                            <p class="text-danger small">{{ $message }}</p>
                                        @enderror
                                    </div>


                                    <div class="col-12 mb-3">
                                        <label for="foto">Upload Foto (Opsional)</label>
                                        <input type="file" id="foto" name="foto" class="form-control" accept="image/png, image/jpeg, image/jpg">
                                        @error('foto')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>




                                </div>


                                <div class="row mb-4">
                                <div class="col-12 mb-3">
                                        <label for="isi_pengaduan">Isi Pengaduan</label>
                                        <textarea name="isi_pengaduan" class="form-control" rows="6" placeholder="Deskripsi Pengaduan Anda" >{{ old('isi_pengaduan') }}</textarea>
                                        @error('isi_pengaduan')
                                            <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>

                                </div>



                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg w-100">Simpan Data Laporan</button>
                                </div>
                            </form>

                      </div>
                    </div>
                        </div>
                        </p>
                    </div>
                </section>
            </div>
        </div>
      </div>
    </section>
    <section id="datapengaduan" class="create_pengaduan section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Daftar Pengaduan</h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama Masyarakat</th>
                                <th>Kategori Pengaduan</th>
                                <th>Tanggal Pengaduan</th>
                                <th>Isi Laporan</th>
                                <th>Foto</th>
                                <th>Status</th>
                                <th class="{{ auth()->user()->role == 'masyarakat' ? 'd-none' : '' }}">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no = 1; @endphp
                        @foreach ($pengaduans as $index => $pengaduan)
                            <tr>
                                <td>{{ $pengaduans->firstItem() + $index }}</td>
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
                                    @if(in_array($pengaduan->status, ['diproses', 'selesai', 'ditolak']))
                                        <a href="/tanggapandariadmin/{{$pengaduan->id}}">
                                            <span class="badge
                                                @if($pengaduan->status == 'diproses') bg-info
                                                @elseif($pengaduan->status == 'selesai') bg-success
                                                @elseif($pengaduan->status == 'ditolak') bg-danger
                                                @endif">
                                                {{ ucfirst($pengaduan->status) }}
                                            </span>
                                        </a>
                                    @else
                                        <span class="badge bg-warning">
                                            Belum Ada Respon
                                        </span>
                                    @endif
                                </td>

                                @if(auth()->user()->role !== 'masyarakat')
                                    <td>
                                        <a href="{{ route('admin.tanggapan.create', ['id' => $pengaduan->id]) }}" class="btn btn-warning btn-sm">c</a>
                                        <a href="/edit_pengaduan/{{$pengaduan->id}}" class="btn btn-sm btn-info mt-1">E</a>
                                        <form action="" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus pengaduan ini?')">H</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $pengaduans->links() }}
            </div>
        </div>
    </section>
</main>


        </div>
      </div>
    <hr>
    </section>
        </div>
        </div>
    </div>
    </section><!-- End Contact Section -->
@endsection
