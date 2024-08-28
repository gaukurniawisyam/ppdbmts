<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran PPDB</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-900 font-sans antialiased">

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
    <div class="bg-light py-10">
        <div class="max-w-5xl mx-auto bg-white p-8 rounded-lg shadow-lg">
            <div class="text-center mb-10">
                <h2 class="text-2xl font-semibold">Pendaftaran PPDB</h2>
            </div>

            <form method="POST" enctype="multipart/form-data" action="{{ url('ppdbdaftarsimpan') }}">
                @csrf
                <div class="space-y-6">

                    <!-- Mendaftar Ke -->
                    <div>
                        <div class="bg-red-500 text-white p-3 rounded">
                            <strong>Mendaftar Ke</strong>
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">Judul Pengumuman</label>
                        <input type="text" class="form-control w-full border border-gray-300 rounded p-2" value="{{ $ppdb->judulppdb }}" readonly>
                        <input type="hidden" name="idppdb" value="{{ $ppdb->idppdb }}">
                        <input type="hidden" name="iduser" value="{{ $user->id }}">
                    </div>

                    <!-- Data Diri -->
                    <div>
                        <div class="text-grey p-3 rounded">
                            <strong>Data Diri</strong>
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">nisn</label>
                        <input type="text" class="form-control w-full border border-gray-300 rounded p-2" name="nisn"
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">Nama</label>
                        <input type="text" class="form-control w-full border border-gray-300 rounded p-2" name="nama" value="{{ $user->nama }}" required>
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">Jenis Kelamin</label>
                        <select class="form-control w-full border border-gray-300 rounded p-2" name="jeniskelamin" required>
                            <option>-- Pilih Jenis Kelamin --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">Asal Sekolah</label>
                        <input type="text" class="form-control w-full border border-gray-300 rounded p-2" name="asalsekolah" required>
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">Tempat Lahir</label>
                        <input type="text" class="form-control w-full border border-gray-300 rounded p-2" name="tempatlahir" required>
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">Tanggal Lahir</label>
                        <input type="date" class="form-control w-full border border-gray-300 rounded p-2" name="tanggallahir" required>
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">Alamat</label>
                        <textarea class="form-control w-full border border-gray-300 rounded p-2" name="alamat" required></textarea>
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">Kelurahan</label>
                        <input type="text" class="form-control w-full border border-gray-300 rounded p-2" name="kelurahan" required>
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">Kecamatan</label>
                        <input type="text" class="form-control w-full border border-gray-300 rounded p-2" name="kecamatan" required>
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">Kabupaten</label>
                        <input type="text" class="form-control w-full border border-gray-300 rounded p-2" name="kabupaten" required>
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">Provinsi</label>
                        <input type="text" class="form-control w-full border border-gray-300 rounded p-2" name="provinsi" required>
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">No. Telepon</label>
                        <input type="number" class="form-control w-full border border-gray-300 rounded p-2" name="nohp" value="{{ $user->nohp }}" required>
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">Email</label>
                        <input type="email" class="form-control w-full border border-gray-300 rounded p-2" name="email" value="{{ $user->email }}" readonly required>
                    </div>

                    <!-- Data Orang Tua -->
                    <div>
                        <div class="bg-red-500 text-white p-3 rounded">
                            <strong>Data Orang Tua</strong>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="mb-2 block font-medium">Nama Ayah</label>
                            <input type="text" class="form-control w-full border border-gray-300 rounded p-2" name="namaayah" required>
                        </div>

                        <div>
                            <label class="mb-2 block font-medium">Pekerjaan Ayah</label>
                            <input type="text" class="form-control w-full border border-gray-300 rounded p-2" name="pekerjaanayah" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="mb-2 block font-medium">Nama Ibu</label>
                            <input type="text" class="form-control w-full border border-gray-300 rounded p-2" name="namaibu" required>
                        </div>

                        <div>
                            <label class="mb-2 block font-medium">Pekerjaan Ibu</label>
                            <input type="text" class="form-control w-full border border-gray-300 rounded p-2" name="pekerjaanibu" required>
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">No Telepon</label>
                        <input type="number" class="form-control w-full border border-gray-300 rounded p-2" name="nohportu" required>
                    </div>

                    <!-- Data Wali -->
                    <div>
                        <div class="bg-red-500 text-white p-3 rounded">
                            <strong>Data Wali</strong>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="mb-2 block font-medium">Nama Wali</label>
                            <input type="text" class="form-control w-full border border-gray-300 rounded p-2" name="namawali">
                        </div>

                        <div>
                            <label class="mb-2 block font-medium">Pekerjaan Wali</label>
                            <input type="text" class="form-control w-full border border-gray-300 rounded p-2" name="pekerjaanwali">
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">No Telepon Wali</label>
                        <input type="number" class="form-control w-full border border-gray-300 rounded p-2" name="nohpwali">
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300" type="submit" name="simpan">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
