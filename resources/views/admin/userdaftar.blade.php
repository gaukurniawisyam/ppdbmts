@extends('admin/layout')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data user</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Data user</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>Data user</h5>
                </div>
                <div class="card-body table-border-style">
                    {{-- <a class="btn btn-primary mb-3" href="{{ url('admin/usertambah') }}">Tambah Data</a> --}}

                    <div class="table-responsive">
                        <table class="table table-hover" id="tabel">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email </th>
                                    <th>No HP</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                ?>
                                @foreach ($user as $row)
                                    <tr>
                                        <td>{{ $no }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td>{{ $row->nohp }}</td>
                                        <td>
                                            <a class="btn btn-primary m-1"
                                                href="{{ url('admin/useredit/' . $row->id) }}">Edit</a>
                                            <a class="btn btn-danger bdel m-1"
                                                href="{{ url('admin/userhapus/' . $row->id) }}" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
                                        </td>
                                    </tr>
                                    <?php
                                    $no++;
                                    ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
