<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pendaftaran PPDB</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-purple-50">
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
<!-- Breadcrumb Section -->
<<div class="flex justify-center">
    <h1 class="text-4xl md:text-5xl font-bold text-center mb-6">Profil</h1>
</div>




    <!-- Profile Form Section -->
    <div class="container mx-auto bg-light py-5 -mt-10">
        <div class="container py-5">
            <div class="mx-auto text-center mb-5" style="max-width: 900px;">
            </div>
            <div class="grid grid-cols-1 gap-6">
                <div class="bg-white p-4 md:p-6 rounded-lg shadow-lg max-w-md mx-auto"> <!-- Menambahkan max-w-md untuk membatasi lebar -->
                    <form method="post" enctype="multipart/form-data" action="{{ url('ubahprofil/' . $pengguna->id) }}">
                        @csrf
                        <div class="grid grid-cols-1 gap-4">
                            <div class="form-group">
                                <label class="block text-gray-700 font-medium mb-2">Nama</label>
                                <input value="{{ $pengguna->nama }}" type="text" class="form-control w-full p-2 border rounded-md" name="nama"> <!-- Mengurangi padding -->
                            </div>
                            <div class="form-group">
                                <label class="block text-gray-700 font-medium mb-2">Email</label>
                                <input value="{{ $pengguna->email }}" type="email" class="form-control w-full p-2 border rounded-md" name="email">
                            </div>
                            <div class="form-group">
                                <label class="block text-gray-700 font-medium mb-2">Telepon</label>
                                <input value="{{ $pengguna->nohp }}" type="number" class="form-control w-full p-2 border rounded-md" name="telepon">
                            </div>
                            <div class="form-group">
                                <label class="block text-gray-700 font-medium mb-2">Alamat</label>
                                <textarea class="form-control w-full p-2 border rounded-md" name="alamat" id="alamat" rows="5">{{ $pengguna->alamat }}</textarea>
                                <script>
                                    CKEDITOR.replace('alamat');
                                </script>
                            </div>
                            <div class="form-group">
                                <label class="block text-gray-700 font-medium mb-2">Password</label>
                                <input type="password" class="form-control w-full p-2 border rounded-md" name="password">
                                <input type="hidden" class="form-control" name="passwordlama" value="{{ $pengguna->password }}">
                                <span class="text-green-600">Kosongkan Password jika tidak ingin mengganti</span>
                            </div>
                            <button class="bg-green-600 text-white py-2 px-4 rounded-lg float-right">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
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
