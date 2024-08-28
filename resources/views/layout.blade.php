<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PPDB - MTS DDI Bowong Cindea</title>
    <link rel="shortcut icon" href="img/2.png" type="image/png">
    
    <!-- Include Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Include Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('slick') }}/css/bootstrap.min.css">
    
    <!-- Custom CSS -->
    <style>
    body {
        font-family: 'Nunito', sans-serif;
        background-color: #f8f9fa;
    }

    .navbar {
        padding: 1rem 2rem;
        background-color: #fff;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .navbar-brand img {
        height: 40px;
    }

    .navbar-nav .nav-link {
        color: #343a40;
        font-weight: 700;
        margin-right: 1.5rem;
        transition: color 0.3s ease-in-out;
    }

    .navbar-nav .nav-link:hover {
        color: #007bff;
    }

    .navbar-toggler {
        border-color: transparent;
    }

    .navbar-toggler:focus {
        outline: none;
    }

    .navbar-toggler-icon {
        color: #343a40;
    }

    .btn-custom {
        color: #fff; /* Teks tetap putih */
        background-color: #006400; /* Hijau DDI */
        padding: 0.5rem 1.25rem;
        border-radius: 5px;
        transition: background-color 0.3s ease-in-out;
    }

    .btn-custom:hover {
        background-color: #004b23; /* Warna hijau lebih gelap untuk efek hover */
        color: #fff; /* Teks tetap putih saat hover */
    }

    .navbar-collapse {
        justify-content: flex-end;
    }

    .navbar-nav .nav-item:last-child {
        margin-right: 0;
    }
</style>


</head>

<body>
    <!-- Header Section Start -->
    <header id="home">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tentang Madrasah</a>
                        </li>         
                        @if (!session('user'))
                        <li class="nav-item">
                            <a class="btn btn-custom" href="{{ url('login') }}">Login</a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('riwayat') }}">Riwayat Pendaftaran</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('ppdb') }}">Daftar Sekolah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('profil') }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-custom" href="{{ url('logout') }}">Logout</a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Content Section -->
    @yield('content')

    <!-- Footer Section Start -->
   <!-- Footer -->
<!-- Footer Section Start -->
<footer class="footer bg-dark text-white py-4 mt-8">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center text-md-left mb-3 mb-md-0">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" style="height: 40px; margin-bottom: 8px;"> <!-- Tinggi logo diatur langsung menggunakan style -->
                <p class="mb-1">MTs DDI Bowong Cindea</p>
                <p class="mb-1">Kelurahan Bowong Cindea, Kec. Bungoro</p>
                <p>Kabupaten Pangkajene dan Kepulauan, Sulawesi Selatan</p>
            </div>
            <div class="col-md-4 text-center mb-3 mb-md-0">
                <h5 class="mb-3">Tautan Terkait</h5>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-white">Tentang Madrasah</a></li>
                    <li><a href="#" class="text-white">Kontributor</a></li>
                    <li><a href="#" class="text-white">Hubungi Kami</a></li>
                </ul>
            </div>
            <div class="col-md-4 text-center text-md-right">
                <h5 class="mb-3">Ikuti Kami</h5>
                <div class="social-icons">
                    <a href="#" class="text-white mr-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-white mr-3"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col text-center">
                <p class="mb-0">&copy; 2024 MTs DDI Bowong Cindea</p>
            </div>
        </div>
    </div>
</footer>

<!-- Footer Section End -->

</body>

    <!-- Include Bootstrap JS and Dependencies -->
    <script src="{{ asset('slick') }}/js/jquery-min.js"></script>
    <script src="{{ asset('slick') }}/js/popper.min.js"></script>
    <script src="{{ asset('slick') }}/js/bootstrap.min.js"></script>
</body>

</html>
