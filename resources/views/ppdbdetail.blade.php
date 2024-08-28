@extends('layout')
@section('content')
    <div class="container-fluid bg-breadcrumb"
        style="background-size: cover; background-image: url('{{ asset('img/latar.jpeg') }}')">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h3 class="text-white display-3 mb-4">Detail PPDB</h1>
        </div>
    </div>


    <section id="business-plan" class="section">
        <!-- Container Starts -->
        <div class="container">
            <!-- Start Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-text section-header text-center">
                        <div>
                            <h2 class="section-title">{{ $ppdb->judulppdb }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
            <!-- Start Row -->
            <div class="row">
                <div class="col-lg-6 col-md-12 pl-0 pt-70 pr-5">
                    <div class="business-item-img">
                        <img src="{{ asset('foto/' . $ppdb->fotoppdb) }}" class="img-fluid" alt="">
                    </div>
                </div>
                <!-- End Col -->
                <!-- Start Col -->
                <div class="col-lg-6 col-md-12 pl-4">
                    <div class="business-item-info">
                        <p>{{ $ppdb->deskripsippdb }}</p><br>
                        <p>
                            Batas Pendaftaran : {{ tanggal($ppdb->tanggalakhir) }}
                        </p>
                        <a class="btn btn-common" href="{{ url('ppdbdaftar/' . $ppdb->idppdb) }}">Daftar</a>
                    </div>
                </div>

            </div>
            <!-- End Row -->
        </div>
    </section>
@endsection
