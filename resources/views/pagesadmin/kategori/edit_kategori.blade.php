@extends('layoutsadmin.app')
@section('contentadmin')


            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Pegawai</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Kategori</a></li>
                                <li class="breadcrumb-item active">Index</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Data Kategori</h3>
                                <a href="kategori-add.html" class="btn float-right btn-outline-secondary btn-md">
                                    <li class="fa fa-plus"></li> Add Data Kategori
                                </a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="col-md-6">
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
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
@endsection
