<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Ulang PPDB</title>
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
                <h2 class="text-2xl font-semibold">Daftar Ulang PPDB</h2>
            </div>

            <!-- Tampilkan pesan sukses jika ada -->
            @if(session('success'))
                <div class="bg-green-100 text-green-700 p-4 mb-6 rounded">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Form Daftar Ulang -->
            <form method="POST" enctype="multipart/form-data" action="{{ url('daftarulangsimpan') }}">
                @csrf
                <div class="space-y-6">
                    <!-- Data Diri -->
                    <div>
                        <div class="text-gray-700 p-3 rounded">
                            <strong>Data Diri</strong>
                        </div>
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">Nama</label>
                        <input type="text" class="form-control w-full border border-gray-300 rounded p-2" name="nama" required>
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">No. Ujian</label>
                        <input type="number" class="form-control w-full border border-gray-300 rounded p-2" name="noujian" required>
                    </div>

                    <div>
                        <label class="mb-2 block font-medium">Upload Berkas</label>
                        <input type="file" class="form-control w-full border border-gray-300 rounded p-2" name="berkas" required>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300" type="submit" name="simpan">Daftar Ulang</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
