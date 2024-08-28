<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-white border border-gray-300 shadow-sm flex flex-col min-h-screen">

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
                <a href="{{ url('/') }}" class="text-gray-700 hover:text-green-500">Beranda</a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="flex-grow">
        <!-- Header -->
        <div class="container mx-auto my-6">
            <div class="bg-gradient-to-r from-green-500 to-green-700 text-white text-center py-6 rounded-lg shadow-lg">
                <h1 class="text-3xl font-bold">Riwayat Pendaftaran</h1>
            </div>
        </div>

        <!-- Info Cards -->
        <div class="container mx-auto grid gap-6">
            @foreach ($pendaftaran as $data)
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-gray-500">Nama</p>
                        <p class="text-black font-semibold">{{ $data->nama }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Email</p>
                        <p class="text-black font-semibold">{{ $data->email }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Waktu Daftar</p>
                        <p class="text-black font-semibold">{{ $data->waktupendaftaran }}</p>
                    </div>
                    <div>
                        <p class="text-gray-500">Status</p>
                        <p class="text-black font-semibold">
                            @switch($data->status)
                                @case('Belum Upload Berkas')
                                    <span class="text-success">Belum Upload Berkas</span>
                                    @break
                                @case('Pendaftaran Di Tolak')
                                    <span class="text-danger">Pendaftaran Anda Di Tolak</span>
                                    @break
                                @case('Berkas Telah di Upload, menunggu konfirmasi admin')
                                    <span class="text-info">Berkas Telah di Upload, menunggu konfirmasi admin</span>
                                    @break
                                @case('Berkas Diterima dan Sedang Verifikasi')
                                    <span class="text-info">Berkas Diterima dan Sedang Verifikasi</span>
                                    @break
                                @case('Berkas Ditolak, Terdapat Ketidaksesuaian pada Berkas')
                                    <span class="text-danger">Berkas Ditolak, Terdapat Ketidaksesuaian pada Berkas</span>
                                    @break
                                @case('Berkas Diterima, Cetak kartu untuk Info Tes')
                                    <span class="text-info">Berkas Diterima, Cetak kartu untuk Info Tes</span>
                                    @break
                                @case('Selamat! Kamu Diterima di sekolah ini! klik cetak surat untuk mendaftar ulang')
                                    <span class="text-success">Selamat! Kamu Diterima di sekolah ini! klik cetak surat untuk mendaftar ulang</span>
                                    @break
                                @case('Sayangnya Kamu Belum Bisa Diterima, Tetap Semangat')
                                    <span class="text-warning">Sayangnya Kamu Belum Bisa Diterima, Tetap Semangat</span>
                                    @break
                                @default
                                    <span class="text-secondary">Status Tidak Diketahui</span>
                            @endswitch
                        </p>
                    </div>
                </div>

                <!-- Button Logic Based on Status -->
                <div class="mt-6 text-right">
                    @if($data->status === 'Berkas Diterima, Cetak kartu untuk Info Tes')
                        <a href="{{ url('/kartu/kartu-ujian') }}" class="bg-green-600 text-white py-3 px-10 rounded-lg">Cetak Kartu Ujian</a>
                    @elseif($data->status === 'Selamat! Kamu Diterima di sekolah ini! klik cetak surat untuk mendaftar ulang')
                        <a href="{{ url('/surat/download-pdf') }}" class="bg-green-600 text-white py-3 px-10 rounded-lg">Cetak Surat Bukti Kelulusan</a>
                        <a href="{{ url('/daftarulang') }}" class="bg-green-600 text-white py-3 px-10 rounded-lg">Daftar Ulang</a>
                    @else
                        <a href="{{ url('riwayatdetail/' . $data->idpendaftaran) }}" class="bg-green-600 text-white py-3 px-10 rounded-lg">Detail</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        <!-- Additional Card -->
        <div class="container mx-auto mt-8">
            <div class="bg-gradient-to-r from-green-200 to-green-300 p-6 rounded-lg shadow-lg text-center">
                <h2 class="text-xl font-semibold mb-2">Bingung Soal Daftar Ulang?</h2>
                <p>Bagus gak <a href="#" class="text-blue-600 underline">Coba tekan ini</a></p>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-green-700 to-green-900 text-white py-6 mt-8 w-full">
        <div class="container mx-auto px-6 md:px-12 flex flex-col md:flex-row items-center justify-between">
            <div class="text-center md:text-left mb-4 md:mb-0">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-12 mx-auto md:mx-0 mb-4 md:mb-0">
                <p class="text-sm">MTs DDI Bowong Cindea</p>
                <p class="text-sm">Kelurahan Bowong Cindea Kec.Bungoro Kabupaten Pangkajene dan Kepulauan Sulawesi Selatan</p>
            </div>
            <div class="flex flex-col md:flex-row items-center space-y-4 md:space-y-0 md:space-x-8 text-center">
                <a href="#" class="text-white">Kontributor</a>
                <a href="#" class="text-white">Ikuti kami</a>
                <div class="flex space-x-4">
                    <a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
