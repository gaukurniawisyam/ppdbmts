@extends('admin/layout')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Peserta PPDB</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data Peserta PPDB</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    @if ($data)
        <br><br>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Pendaftar</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-12 col-lg-12">
                                <div class="contact-form-area2 mb-100">
                                    <!-- Data Siswa -->
                                    <div class="alert alert-primary">
                                        <strong>Data Siswa</strong>
                                    </div>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th colspan="2">Mendaftar Ke</th>
                                        </tr>
                                    </table>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th colspan="2">Data Siswa</th>
                                        </tr>
                                        <tr>
                                            <td width="250px">Nama</td>
                                            <td>{{ $data->nama ?? 'Data tidak tersedia' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>{{ $data->jeniskelamin ?? 'Data tidak tersedia' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tempat Lahir</td>
                                            <td>{{ $data->tempatlahir ?? 'Data tidak tersedia' }}</td>
                                        </tr>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
