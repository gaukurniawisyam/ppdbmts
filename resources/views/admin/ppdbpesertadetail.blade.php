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
        <a class="btn btn-primary" name="konfirmasi" data-toggle="modal" data-target="#verifikasi">Konfirmasi</a>
        <a class="btn btn-success" href="{{ url('tandaterima/' . $data->idpendaftaran) }}" target="_blank">Tanda Terima</a>
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
                                        <tr>
                                            <td width="250px">Judul Pengumuman</td>
                                            <td>{{ $data->judulppdb ?? 'Data tidak tersedia' }}</td>
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
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td>{{ isset($data->tanggallahir) ? tanggal($data->tanggallahir) : 'Data tidak tersedia' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>{{ $data->alamat ?? 'Data tidak tersedia' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kelurahan</td>
                                            <td>{{ $data->kelurahan ?? 'Data tidak tersedia' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kecamatan</td>
                                            <td>{{ $data->kecamatan ?? 'Data tidak tersedia' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kabupaten</td>
                                            <td>{{ $data->kabupaten ?? 'Data tidak tersedia' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Provinsi</td>
                                            <td>{{ $data->provinsi ?? 'Data tidak tersedia' }}</td>
                                        </tr>
                                        <tr>
                                            <td>No. HP</td>
                                            <td>{{ $data->nohp ?? 'Data tidak tersedia' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $data->email ?? 'Data tidak tersedia' }}</td>
                                        </tr>
                                    </table>

                                    <!-- Data Orang Tua -->
                                    <div class="alert alert-primary">
                                        <strong>Data Orang Tua</strong>
                                    </div>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th colspan="2">Data Orang Tua</th>
                                        </tr>
                                        <tr>
                                            <td width="250px">Nama Ayah</td>
                                            <td>{{ $data->namaayah ?? 'Data tidak tersedia' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan Ayah</td>
                                            <td>{{ $data->pekerjaanayah ?? 'Data tidak tersedia' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Ibu</td>
                                            <td>{{ $data->namaibu ?? 'Data tidak tersedia' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan Ibu</td>
                                            <td>{{ $data->pekerjaanibu ?? 'Data tidak tersedia' }}</td>
                                        </tr>
                                        <tr>
                                            <td>No. HP Orang Tua</td>
                                            <td>{{ $data->nohportu ?? 'Data tidak tersedia' }}</td>
                                        </tr>
                                    </table>

                                    <!-- Data Wali -->
                                    <div class="alert alert-primary">
                                        <strong>Data Wali</strong>
                                    </div>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th colspan="2">Data Wali</th>
                                        </tr>
                                        <tr>
                                            <td width="250px">Nama Wali</td>
                                            <td>{{ $data->namawali ?? 'Data tidak tersedia' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan Wali</td>
                                            <td>{{ $data->pekerjaanwali ?? 'Data tidak tersedia' }}</td>
                                        </tr>
                                        <tr>
                                            <td>No. HP Wali</td>
                                            <td>{{ $data->nohpwali ?? 'Data tidak tersedia' }}</td>
                                        </tr>
                                    </table>

                                    <!-- Berkas -->
                                    @if (!empty($data->kk) || !empty($data->ktp) || !empty($data->ijazah))
                                        <table class="table table-bordered">
                                            <tr>
                                                <th colspan="2">Berkas</th>
                                            </tr>
                                            @foreach (['kk' => 'Kartu Keluarga', 'ktp' => 'KTP', 'ijazah' => 'Ijazah'] as $fileKey => $fileLabel)
                                                <tr>
                                                    <td width="250px">Scan {{ $fileLabel }}</td>
                                                    <td>
                                                        @if ($data->$fileKey)
                                                            @if ($data->status == "Berkas Ditolak, Terdapat Ketidaksesuaian pada Berkas")
                                                                <form action="{{ route("upload_{$fileKey}") }}" method="POST" enctype="multipart/form-data" style="display: inline;">
                                                                    @csrf
                                                                    <input type="file" name="file" required>
                                                                    <input type="hidden" name="idpendaftaran" value="{{ $data->idpendaftaran }}">
                                                                    <button type="submit" class="btn btn-success">Upload</button>
                                                                </form>
                                                            @endif
                                                            <form action="{{ route("delete_{$fileKey}", ['id' => $data->idpendaftaran]) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus file ini?');">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </form>
                                                            <a class="btn btn-info" href="{{ route('view_file', ['filename' => $data->$fileKey]) }}" target="_blank">Lihat</a>
                                                        @else
                                                            @if ($data->status == "Berkas Ditolak, Terdapat Ketidaksesuaian pada Berkas")
                                                                <form action="{{ route("upload_{$fileKey}") }}" method="POST" enctype="multipart/form-data" style="display: inline;">
                                                                    @csrf
                                                                    <input type="file" name="file" required>
                                                                    <input type="hidden" name="idpendaftaran" value="{{ $data->idpendaftaran }}">
                                                                    <button type="submit" class="btn btn-success">Upload</button>
                                                                </form>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="verifikasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Verifikasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ url('admin/ppdbpesertasimpan/' . $data->idpendaftaran) }}">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Pilih Status</label>
                                <input type="hidden" name="iduser" class="form-control" value="{{ $data->iduser }}">
                                <input type="hidden" name="idppdb" class="form-control" value="{{ $data->idppdb }}">
                                <select name="status" class="form-control" required>
                                    @php
                                        $statusOptions = [
                                            'Selamat! Kamu Diterima di sekolah ini! klik cetak surat untuk mendaftar ulang' => 'Selamat! Kamu Diterima di sekolah ini! klik cetak surat untuk mendaftar ulang',
                                            'Berkas Diterima dan Sedang Verifikasi' => 'Berkas Diterima dan Sedang Verifikasi',
                                            'Berkas Ditolak, Terdapat Ketidaksesuaian pada Berkas' => 'Berkas Ditolak, Terdapat Ketidaksesuaian pada Berkas',
                                            'Berkas Diterima, Cetak kartu untuk Info Tes' => 'Berkas Diterima, Cetak Kartu Ujian untuk Info Tes',
                                            'Sayangnya Kamu Belum Bisa Diterima, Tetap Semangat' => 'Sayangnya Kamu Belum Bisa Diterima, Tetap Semangat',
                                            'Kamu Diterima Klik Link Telegram' => 'Kamu Diterima Klik Link Telegram',
                                        ];
                                    @endphp
                                    @foreach ($statusOptions as $value => $label)
                                        <option value="{{ $value }}" {{ $data->status == $value ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan:</label>
                                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @else
        <div class="container text-center py-5">
            <h3>Data tidak ditemukan.</h3>
        </div>
    @endif
@endsection
