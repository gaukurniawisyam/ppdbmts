@extends('admin/layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah PPDB</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah PPDB</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Tambah PPDB</h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-12 col-lg-12">
                            <form method="post" enctype="multipart/form-data" action="{{ url('admin/ppdbtambahsimpan') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" value="{{ old('judulppdb') }}" class="form-control" name="judulppdb">
                                            @error('judulppdb')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <textarea class="form-control" name="deskripsippdb" required cols="30" rows="10">{{ old('deskripsippdb') }}</textarea>
                                            <script>
                                                CKEDITOR.replace('deskripsippdb');
                                            </script>
                                            @error('deskripsippdb')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-12">
                                        <div class="form-group">
                                            <label>Tanggal Akhir Pendaftaran</label>
                                            <input type="date" class="form-control" name="tanggalakhir" value="{{ old('tanggalakhir') }}">
                                            @error('tanggalakhir')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Foto</label>
                                            <input type="file" class="form-control" name="foto" required>
                                            @error('foto')
                                                <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
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
