<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>

    <!-- Google Sans Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Google+Sans:wght@300;400;500;700&display=swap">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-assets/assets/dist/css/adminlte.min.css') }}">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Google Sans', sans-serif;
            background-color: #f5f5f5;
            color: #333;
        }
        .navbar, .main-sidebar {
            background-color: #fff;
            color: #333;
        }
        .nav-link, .user-panel a {
            color: #333 !important;
        }
        .nav-link:hover, .user-panel a:hover {
            color: #1a73e8 !important;
        }
        .sidebar-dark-primary {
            background-color: #fff !important;
        }
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active {
            background-color: #e8f0fe;
            color: #1a73e8 !important;
        }
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active:hover {
            background-color: #d0e3fc;
            color: #1a73e8 !important;
        }
        .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link:hover {
            background-color: #e8f0fe;
            color: #1a73e8 !important;
        }
        .content-wrapper {
            background-color: #fff;
            color: #333;
        }
        .main-footer {
            background-color: #f5f5f5;
            color: #333;
            border-top: 1px solid #e0e0e0;
        }
        .preloader {
            background-color: #f5f5f5;
        }
        .dark-mode {
            background-color: #121212;
            color: #e0e0e0;
        }
        .dark-mode .navbar, .dark-mode .main-sidebar, .dark-mode .main-footer {
            background-color: #1e1e1e;
            color: #e0e0e0;
        }
        .dark-mode .nav-link, .dark-mode .user-panel a {
            color: #e0e0e0 !important;
        }
        .dark-mode .nav-link:hover, .dark-mode .user-panel a:hover {
            color: #bb86fc !important;
        }
        .dark-mode .sidebar-dark-primary {
            background-color: #1e1e1e !important;
        }
        .dark-mode .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active {
            background-color: #3700b3;
            color: #bb86fc !important;
        }
        .dark-mode .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link.active:hover {
            background-color: #4a148c;
            color: #bb86fc !important;
        }
        .dark-mode .sidebar-dark-primary .nav-sidebar>.nav-item>.nav-link:hover {
            background-color: #3700b3;
            color: #bb86fc !important;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="{{ asset('img/logo.png') }}" alt="AdminLTELogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <!-- Dark Mode Toggle -->
            <li class="nav-item">
                <a class="nav-link" href="#" id="dark-mode-toggle">
                    <i class="fas fa-moon"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('img/logo.png') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ (session('admin')->level) }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ url('admin/dashboard') }}" class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/admindaftarulang') }}" class="nav-link {{ request()->is('admin/daftarulang') ? 'active' : '' }}">
                            <i class="nav-icon far fa-user"></i>
                            <p>Daftar Ulang</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/ppdbdaftar') }}" class="nav-link {{ request()->is('admin/ppdbdaftar') ? 'active' : '' }}">
                            <i class="nav-icon far fa-list-alt"></i>
                            <p>Data PPDB</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/userdaftar') }}" class="nav-link {{ request()->is('admin/userdaftar') ? 'active' : '' }}">
                            <i class="nav-icon far fa-user"></i>
                            <p>User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('admin/tanggalujian') }}" class="nav-link {{ request()->is('admin/tanggalujian') ? 'active' : '' }}">
                            <i class="nav-icon far fa-calendar"></i>
                            <p>Set Tanggal Ujian</p>
                        </a>
                    </li>
                    @if (session('admin')->level == 'Superadmin')
                        <li class="nav-item">
                            <a href="{{ url('admin/admindaftar') }}" class="nav-link {{ request()->is('admin/admindaftar') ? 'active' : '' }}">
                                <i class="nav-icon fa-right-from-bracket"></i>
                                <p>Admin</p>
                            </a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <a href="{{ url('admin/logout') }}" class="nav-link">
                            <i class="nav-icon fa-right-from-bracket"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.1.0
        </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    <!-- /.control-sidebar -->

    <!-- jQuery -->
    <script src="{{ asset('admin-assets/assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('admin-assets/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('admin-assets/assets/dist/js/adminlte.js') }}"></script>

    <script>
        $(document).ready(function () {
            // Check for dark mode preference in local storage
            if (localStorage.getItem('dark-mode') === 'enabled') {
                $('body').addClass('dark-mode');
            }

            // Toggle Dark Mode
            $('#dark-mode-toggle').on('click', function () {
                $('body').toggleClass('dark-mode');

                // Store the user's preference in local storage
                if ($('body').hasClass('dark-mode')) {
                    localStorage.setItem('dark-mode', 'enabled');
                } else {
                    localStorage.setItem('dark-mode', 'disabled');
                }
            });
        });
    </script>
</body>

</html>
