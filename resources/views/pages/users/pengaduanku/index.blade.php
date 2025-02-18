@extends('layouts.layoutuser')

@section('contentuser')
<section class="inner-page">
    <div class="container table-responsive">
      <a href="/pengaduanku/create" class="btn btn-success btn-md">Buat Pengaduan</a>
      <hr>
      <p>
        <table class="table table-responsive table-hover">
          <thead>
            <tr>
              <th>#</th>
              <th>Judul Pengaduan</th>
              <th>Kategori</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($pengaduans as $pengaduan)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $pengaduan->judul }}</td>
              <td>{{ $pengaduan->kategoripengaduan ? $pengaduan->kategoripengaduan->namakategori : 'N/A' }}</td> <!-- Display category name -->
              <td>{{ $pengaduan->status }}</td>
              <td><a href="{{ route('pengaduanku.show', $pengaduan->id) }}" class="btn btn-primary btn-sm">Detail</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </p>
    </div>
</section>
@endsection
