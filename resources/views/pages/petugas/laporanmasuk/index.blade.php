@extends('layouts.layoutpetugas')

@section('contentpetugas')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Laporan Masuk</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 float-right">
                            <label for="selectFilterStatus">Filter Berdasarkan status</label>
                            <select name="selectFilterStatus" id="selectFilterStatus" class="form form-control">
                                <option value="">-- Filter Status --</option>
                                <option value="New">New</option>
                                <option value="Proses">Proses</option>
                                <option value="selesai">Selesai</option>
                                <option value="Di Tolak">Di Tolak</option>
                            </select>
                        </div>
                        <div class="col-md-3 float-right">
                            <label for="selectFilter">Filter Berdasarkan Kategori</label>
                            <select name="selectFilter" id="selectFilter" class="form form-control">
                                <option value="">-- Filter Kategori --</option>
                                @foreach ($kategoriPengaduan as $kategori)
                                    <option value="{{ $kategori->id }}">{{ $kategori->namakategori }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <table id="example5" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tanggal Pengaduan</th>
                                        <th>Judul Pengaduan</th>
                                        <th>Nama Pengadu</th>
                                        <th>Kategori</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
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
                        return '<a href="/laporanmasukpetugas/detail/' + row.id + '" class="btn btn-primary btn-xs"><li class="fa fa-list"></li> Detail</a>';
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
