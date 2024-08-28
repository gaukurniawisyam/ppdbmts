<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftaran PPDB</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto flex items-center justify-between py-4">
            <!-- Logo dan Nama -->
            <div class="flex items-center space-x-2">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-8">
                <span class="font-bold text-black">PPDB MTs DDI Bowong Cindea</span>
            </div>
            <!-- Menu Links -->
            <div class="flex items-center space-x-8">
                <a href="#" class="text-gray-700 hover:text-green-500">Tentang Madrasah</a>
                <a href="{{ url('/riwayat') }}" class="block w-full text-center bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                    Kembali Ke Riwayat
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-6 py-10">
        <div class="bg-white shadow-lg rounded-lg p-6">
            <!-- Status Pendaftaran -->
            <h2 class="text-2xl font-bold text-lime-600 mb-6">Status Pendaftaran: 
                <span class="
                    @if($pendaftaran->status == 'Berkas Ditolak, Terdapat Ketidaksesuaian pada Berkas' || $pendaftaran->status == 'Belum Upload Berkas') 
                        text-red-600 
                    @elseif($pendaftaran->status == 'Berkas Sedang Diverifikasi') 
                        text-yellow-600 
                    @elseif($pendaftaran->status == 'Berkas Diterima') 
                        text-green-600 
                    @else 
                        text-lime-800 
                    @endif
                ">
                    {{ $pendaftaran->status }}
                </span>
            </h2>

            <!-- Data Sections -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Data Siswa -->
                <div>
                    <table class="table-auto w-full text-sm">
                        <thead>
                            <tr>
                                <th class="text-green-600 font-semibold p-2 text-left" colspan="2">Data Peserta</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Replace these with actual data fields -->
                            @foreach (['nisn', 'nama', 'jeniskelamin', 'asalsekolah', 'tempatlahir', 'tanggallahir', 'alamat', 'kelurahan', 'kecamatan', 'kabupaten', 'provinsi', 'nohp', 'email'] as $field)
                                <tr class="{{ $loop->index % 2 == 0 ? 'bg-gray-100' : '' }}">
                                    <td class="font-semibold p-2">{{ ucfirst(str_replace('_', ' ', $field)) }}</td>
                                    <td class="p-2">{{ $pendaftaran->$field }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Data Orang Tua -->
                <div>
                    <table class="table-auto w-full text-sm">
                        <thead>
                            <tr>
                                <th class="text-green-600 font-semibold p-2 text-left" colspan="2">Data Orang Tua</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (['namaayah' => 'Nama Ayah', 'pekerjaanayah' => 'Pekerjaan Ayah', 'namaibu' => 'Nama Ibu', 'pekerjaanibu' => 'Pekerjaan Ibu', 'nohportu' => 'No. HP Orang Tua'] as $field => $label)
                                <tr class="{{ $loop->index % 2 == 0 ? 'bg-gray-100' : '' }}">
                                    <td class="font-semibold p-2">{{ $label }}</td>
                                    <td class="p-2">{{ $pendaftaran->$field }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <table class="table-auto w-full text-sm mt-4">
                        <thead>
                            <tr>
                                <th class="text-green-600 font-semibold p-2 text-left" colspan="2">Data Wali</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (['namawali' => 'Nama Wali', 'pekerjaanwali' => 'Pekerjaan Wali', 'nohpwali' => 'No. HP Wali'] as $field => $label)
                                <tr class="{{ $loop->index % 2 == 0 ? 'bg-gray-100' : '' }}">
                                    <td class="font-semibold p-2">{{ $label }}</td>
                                    <td class="p-2">{{ $pendaftaran->$field }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Feedback Message -->
            @if (session('feedback'))
                <div class="mt-4 bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
                    <p class="font-bold">Informasi</p>
                    <p class="text-sm">{{ session('feedback') }}</p>
                </div>
            @endif

            @if ($pendaftaran->status == "Berkas Ditolak, Terdapat Ketidaksesuaian pada Berkas" || $pendaftaran->status == "Belum Upload Berkas")
            <!-- Section for File Uploads -->
            <div class="bg-white shadow-lg rounded-lg p-6 mt-8">
                <h2 class="text-2xl font-bold text-lime-600 mb-6">Upload Berkas</h2>
                <form action="{{ route('update_status', $pendaftaran->idpendaftaran) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="status" value="Berkas Diterima dan Sedang Verifikasi">

                    <div class="grid grid-cols-1 gap-6">
                        <!-- Kartu Keluarga -->
                        @if (!$pendaftaran->kk)
                            <div class="bg-gray-100 p-4 rounded-lg">
                                <label class="font-semibold text-sm">Scan Kartu Keluarga</label>
                                <input type="file" name="kk" class="block w-full mt-2 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-lime-50 file:text-lime-700 hover:file:bg-lime-100">
                            </div>
                        @endif

                        <!-- Pas Foto -->
                        @if (!$pendaftaran->ktp)
                            <div class="bg-gray-100 p-4 rounded-lg">
                                <label class="font-semibold text-sm">Pas Foto (harus 3x4 dibawah 2mb format jpg)</label>
                                <input type="file" name="ktp" class="block w-full mt-2 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-lime-50 file:text-lime-700 hover:file:bg-lime-100">
                            </div>
                        @endif

                        <!-- Ijazah -->
                        @if (!$pendaftaran->ijazah)
                            <div class="bg-gray-100 p-4 rounded-lg">
                                <label class="font-semibold text-sm">Scan Ijazah</label>
                                <input type="file" name="ijazah" class="block w-full mt-2 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-lime-50 file:text-lime-700 hover:file:bg-lime-100">
                            </div>
                        @endif
                    </div>

                    <!-- Save Button -->
                    <button type="submit" class="mt-4 w-full bg-blue-600 text-white py-2 rounded-lg shadow-md hover:bg-blue-700">Simpan dan Upload Berkas</button>
                </form>
            </div>
            @endif
        </div>
    </div>
</body>
</html>
