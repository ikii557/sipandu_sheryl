@extends('layouts.layoutadmin')
@section('content')
<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Kategori</h3>
                    <a href="/kategori" class="btn float-right btn-outline-warning btn-md">
                        <li class="fa fa-undo"></li> Kembali
                    </a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="/update_kategori/{{$kategoris->id}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" value="{{ $kategoris->nama_kategori }}" name="nama_kategori" id="nama_kategori" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" value="{{ $kategoris->deskripsi }}" name="deskripsi" id="deskripsi" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-md">
                                <i class="fa fa-save"></i> Simpan
                            </button>
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