@extends('layouts.layoutuser')

@section('contentuser')
<section class="inner-page">
    <div class="container">


        <!-- Complaint Detail Section -->
        <div class="row gy-4">
            <!-- Left Section: Image/Slider -->
            <div class="col-lg-8">
                <div class="portfolio-details-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <!-- Dynamic Image -->
                        @if ($pengaduan->foto)
                        <img src="{{ Storage::url($pengaduan->foto) }}" alt="Foto Pengaduan" width="800">
                        @else
                            Tidak ada foto
                        @endif
                    </div>
                </div>
            </div>

            <!-- Right Section: Information and Description -->
            <div class="col-lg-4">
                <div class="portfolio-info">
                    <h3>{{ $pengaduan->judul }}</h3>
                    <ul>

                        <li><strong>Category</strong>: {{ $pengaduan->kategoripengaduan ? $pengaduan->kategoripengaduan->namakategori : 'N/A' }}</li>
                        <li><strong>Tanggal Pengaduan</strong>: {{ \Carbon\Carbon::parse($pengaduan->tanggalpengaduan)->format('d M, Y') }}</li>
                        <li><strong>Status Pengaduan</strong>: {{ $pengaduan->status }}

                        </li>
                    </ul>
                </div>
                <div class="portfolio-description">
                    <p>{{ $pengaduan->isipengaduan }}</p>
                </div>
                <a href="{{ route('pengaduanku.index') }}" class="btn btn-warning btn-md">Kembali</a>
            </div>
        </div>
    </div>
</section>
@endsection
