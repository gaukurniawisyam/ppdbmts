@extends('admin/layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Admin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Admin</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Edit Admin</h5>
                </div>
                <div class="card-body table-border-style">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-12 col-lg-12">
                            <form method="post" enctype="multipart/form-data"
                                action="{{ url('admin/admineditsimpan/' . $row->idadmin) }}">
                                @csrf
                                <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input type="text" value="{{ $row->nama }}" class="form-control" name="nama">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" name="email" value="{{ $row->email }}">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="text" class="form-control" name="password">
                                                <input type="hidden" class="form-control" name="passwordlama" value="{{ $row->password }}">
                                                <span class="text-danger">Kosongkan Password jika tidak ingin mengganti</span>
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary float-right" name="ubah">Simpan</button>
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
