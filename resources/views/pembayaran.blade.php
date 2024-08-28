@extends('layout')
@section('content')
    <div class="container-fluid bg-breadcrumb"
        style="background-size: cover; background-image: url('{{ asset('img/latar.jpeg') }}')">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Pembayaran PPDB</h1>
        </div>
    </div>

    <div class="container-fluid contact bg-light py-5">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
                <h5 class="section-title px-3">Pembayaran PPDB</h5>
            </div>
            <div class="row g-5 align-items-center">
                <div class="col-lg-12">
                    <div class="row g-3">
                        <h6 style="padding-top: 50px;">Data Siswa</h6>
                        <table class="table table-bordered">
                            <tr>
                                <th colspan="2">
                                    Mendaftar Ke
                                </th>
                            </tr>
                            <tr>
                                <td width="250px">Judul Pengumuman</td>
                                <td>{{ $detail->judulppdb }}</td>
                            </tr>
                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th colspan="2">
                                    Data Siswa
                                </th>
                            </tr>
                            <tr>
                                <td width="250px">Nama</td>
                                <td>{{ $detail->nama }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Kelamin</td>
                                <td>{{ $detail->jeniskelamin }}</td>
                            </tr>
                            <tr>
                                <td>Tempat Lahir</td>
                                <td>{{ $detail->tempatlahir }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>{{ tanggal($detail->tanggallahir) }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>{{ $detail->alamat }}</td>
                            </tr>
                            <tr>
                                <td>No. HP</td>
                                <td>{{ $detail->nohp }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $detail->email }}</td>
                            </tr>
                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th colspan="2">Data Orang Tua</th>
                            </tr>
                            <tr>
                                <td width="250px">Nama Ayah</td>
                                <td>{{ $detail->namaayah }}</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan Ayah</td>
                                <td>{{ $detail->pekerjaanayah }}</td>
                            </tr>
                            <tr>
                                <td>Nama Ibu</td>
                                <td>{{ $detail->namaibu }}</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan Ibu</td>
                                <td>{{ $detail->pekerjaanibu }}</td>
                            </tr>
                            <tr>
                                <td>No. HP Orang Tua</td>
                                <td>{{ $detail->nohportu }}</td>
                            </tr>
                        </table>
                        <table class="table table-bordered">
                            <tr>
                                <th colspan="2">Data Wali</th>
                            </tr>
                            <tr>
                                <td width="250px">Nama Wali</td>
                                <td>{{ $detail->namawali }}</td>
                            </tr>
                            <tr>
                                <td>Pekerjaan Wali</td>
                                <td>{{ $detail->pekerjaanwali }}</td>
                            </tr>
                            <tr>
                                <td>No. HP Wali</td>
                                <td>{{ $detail->nohpwali }}</td>
                            </tr>
                        </table>

                    </div>
                </div>
            </div>

            <div class="row justify-content-center mb-5 mt-5">
                <div class="col-md-7">
                    <b>Silahkan melakukan pembayaran ke :<br>PPDB SEKOLAH, 123 456 7890, Bank BRI</b>
                    <br>
                    <br>


                    <form method="post" enctype="multipart/form-data" action="{{ url('pembayaransimpan') }}">
                        @csrf
                        <input type="hidden" name="idpendaftaran" value="{{ $detail->idpendaftaran }}">
                        <div class="form-group">
                            <label class="mb-2">Atas Nama</label>
                            <input type="text" name="atasnama" class="form-control mb-2"
                                value="{{ session('user')->nama }}" required>

                        </div>
                        <div class="form-group">
                            <label class="mb-2">Tanggal Pembayaran</label>
                            <input type="date" name="tanggaltransfer" class="form-control mb-2"
                                value="<?= date('Y-m-d') ?>" required>

                        </div>
                        <div class="form-group">
                            <label class="mb-2">Foto Bukti</label>
                            <input type="file" name="foto" class="form-control mb-2" required>
                        </div>
                        <button class="btn btn-success float-right" name="kirim">Kirim Bukti Pembayaran</button>
                    </form>
                </div>
                <div class="col-md-5 my-auto">
                    <img width="100%" src="{{ asset('foto/pembayaran.png') }}">
                </div>
            </div>
        </div>
    </div>
@endsection
