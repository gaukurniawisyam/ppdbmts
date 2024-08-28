@extends('layout')

<head>
    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Other head elements -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <!-- Include Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

@section('content')
<section class="section d-flex align-items-center" style="background-size: cover; min-height: 100vh;">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 order-lg-1 order-2">
                <h1 class="display-4">MTs DDI Bowong Cindea</h1>
                @if (!session('user'))
                <p> Hai Adik Adik!, Ini Senang banget bisa ketemu kalian di sini! Kami di MTs DDI Bowong
                            Cindea siap banget untuk menyambut kalian yang mau gabung jadi bagian dari keluarga
                            besar kami. <br> Di sini, nggak cuma sekedar sekolah, tapi juga tempat buat kalian
                            belajar, eksplor, dan berkembang jadi yang terbaik versi kalian sendiri.<br> Jadi, yuk
                            langsung aja daftar dan jadi bagian dari petualangan seru bareng kami di MTs DDI Bowong
                            Cindea! Can't wait to see you around!"</p>
                    <div class="d-flex">
                        <a href="{{ url('daftar/') }}" class="btn mr-2" style="background-color: #82ae46; color: white;"> 
                            Buat Akun Mu Sekarang! 
                        </a>
                    </div>
                @else
                    <p class="lead">Adik Adik, Untuk melanjutkan mendaftar di madrasah tekan daftar sekolah di bagian atas ya! (Bagi pengguna Ponsel,Tekan tombol garis tiga di tepi kanan atas),Disarankan gunakan Laptop</p>
                @endif
            </div>
            <div class="col-lg-6 col-md-12 order-lg-2 order-1 text-center">
                <img src="{{ asset('/img/logo.png') }}" alt="App Preview" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- Carousel and Cards Section -->
<section class="section mt-3">
    <div class="container">
        <div class="row">
            <!-- Carousel Section -->
            <div class="col-md-8">
                <div id="imageCarousel" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#imageCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#imageCarousel" data-slide-to="1"></li>
                        <li data-target="#imageCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://via.placeholder.com/800x400.png?text=Image+1" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/800x400.png?text=Image+2" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://via.placeholder.com/800x400.png?text=Image+3" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <!-- Text Section -->
            <div class="col-md-4">
                <h5 class="mt-3">Welcome to Our Madrasah</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
        </div>
    </div>
</section>
]
@endsection

@push('styles')
<style>
    .section {
        margin-bottom: 50px;
        padding-top: 20px; /* Menggeser teks ke atas */
    }

    .carousel {
        z-index: 10;
        margin-bottom: 20px; /* Menggeser carousel ke atas */
    }
</style>

@endpush

