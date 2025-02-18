@extends('layouts.layoutadmin')

@section('content')
@if (session('success'))
    <div class="alert alert-success" id="alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger" id="alert-error">
        {{ session('error') }}
    </div>
@endif

<script>
    // Hilangkan notifikasi setelah 3 detik (3000 ms)
    setTimeout(function() {
        let successAlert = document.getElementById('alert-success');
        let errorAlert = document.getElementById('alert-error');

        if (successAlert) {
            successAlert.style.transition = "opacity 0.5s";
            successAlert.style.opacity = "0";
            setTimeout(() => successAlert.remove(), 500);
        }

        if (errorAlert) {
            errorAlert.style.transition = "opacity 0.5s";
            errorAlert.style.opacity = "0";
            setTimeout(() => errorAlert.remove(), 500);
        }
    }, 3000);
</script>

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Laporan Masuk</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <form method="GET" action="{{ route('pengaduan.laporan') }}">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="start_date">Tanggal Awal</label>
                                    <input type="date" class="form-control" id="start_date" name="start_date" value="{{ request('start_date') }}">
                                </div>
                                <div class="col-md-3">
                                    <label for="end_date">Tanggal Akhir</label>
                                    <input type="date" class="form-control" id="end_date" name="end_date" value="{{ request('end_date') }}">
                                </div>
                                <div class="col-md-3 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
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
                        <div class="d-flex justify-content-center">
                            {{ $pengaduans->links() }}
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
<script type="text/javascript">
    $(document).ready(function() {
        const table = $('#example5').DataTable({
            "pageLength": 10,
            "lengthMenu": [
                [10, 25, 50, 100],
                [10, 25, 50, 100]
            ],
            "bLengthChange": true,
            "bFilter": true,
            "bInfo": true,
            "processing": true,
            "bServerSide": true,
            ajax: {
                url: "{{ url('') }}/dataTableLaporan",
                type: "POST",
                data: function(d) {
                    d.status = $('#selectFilterStatus').val();  // Filter status
                    d.kategori_id = $('#selectFilter').val();  // Filter kategori
                }
            },
            columnDefs: [
                {
                    targets: 0,
                    "class": "text-nowrap",
                    "render": function(data, type, row, meta){
                        return row.id;
                    }
                },
                {
                    targets: 1,
                    "class": "text-nowrap",
                    "render": function(data, type, row, meta){
                        return row.tanggalpengaduan;
                    }
                },
                {
                    targets: 2,
                    "class": "text-nowrap",
                    "render": function(data, type, row, meta){
                        return row.judul;
                    }
                },
                {
                    targets: 3,
                    "class": "text-nowrap",
                    "render": function(data, type, row, meta){
                        return row.name;
                    }
                },
                {
                    targets: 4,
                    "class": "text-nowrap",
                    "render": function(data, type, row, meta){
                        return row.namakategori;
                    }
                },
                {
                    targets: 5,
                    "class": "text-nowrap",
                    "render": function(data, type, row, meta){
                        return row.status;
                    }
                },
                {
                    targets: 6,  
                    class: "text-nowrap",
                    render: function(data, type, row, meta) {
                        return '<a href="/laporanmasuk/detail/' + row.id + '" class="btn btn-primary btn-xs"><li class="fa fa-list"></li> Detail</a>';
                    }
                }
            ]
        });
        $('#selectFilterStatus, #selectFilter').on('change', function() {
            table.ajax.reload(); 
        });
    });
</script>
@endsection
