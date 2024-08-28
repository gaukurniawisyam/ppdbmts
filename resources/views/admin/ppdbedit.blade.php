@extends('admin/layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit PPDB</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit PPDB</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit PPDB</h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-12 col-lg-12">
                            <form method="post" enctype="multipart/form-data"
                                action="{{ url('admin/ppdbeditsimpan/' . $row->idppdb) }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" value="{{ $row->judulppdb }}" class="form-control"
                                                name="judulppdb">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control" name="deskripsippdb" required cols="30" rows="10">{{ $row->deskripsippdb }}</textarea>
                                            <script>
                                                CKEDITOR.replace('deskripsippdb');
                                            </script>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label>Tanggal Akhir Pendaftaran</label>
                                            <input type="date" class="form-control" name="tanggalakhir"
                                                value="{{ $row->tanggalakhir }}">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" class="form-control" name="foto" value="">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary float-right"
                                            name="simpan">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
