<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Desain Kurikulum</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper" id="app">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <!-- <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
                <span class="brand-text font-weight-light">Desain Kurikulum</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <!-- <div class="image">
                        <img src="{{ asset('images/admin.png') }}" class="img-circle elevation-2" alt="User Image">
                    </div> -->
                    <div class="info">
                        <a href="#" class="d-block">{{ auth()->user()->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <router-link to="/home/dashboard" class="nav-link">
                                <i class="nav-icon fas fa-tachometer-alt cyan"></i>
                                <p>Dashboard</p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link to="/home/profillulusan" class="nav-link">
                                <i class="nav-icon fas fa-user yellow"></i>
                                <p>Profil Lulusan</p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link to="/home/detailprofillulusan" class="nav-link">
                                <i class="nav-icon fas fa-list"></i>
                                <p>Detail Profil Lulusan</p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link to="/home/cplprodi" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>CPL Program Studi</p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link to="/home/kesepadananku" class="nav-link">
                                <i class="nav-icon fas fa-clone"></i>
                                <p>Kesepadanan KU</p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link to="/home/bahankajian" class="nav-link">
                                <i class="nav-icon fas fa-folder"></i>
                                <p>Pemilihan Bahan Kajian</p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link to="/home/kajian" class="nav-link">
                                <i class="nav-icon fas fa-check"></i>
                                <p>Penetapan Mata Kuliah</p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link to="/home/matkul" class="nav-link">
                                <i class="nav-icon fas fa-bars"></i>
                                <p>Daftar Mata Kuliah</p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link to="/home/detailmatkul" class="nav-link">
                                <i class="nav-icon fas fa-tasks"></i>
                                <p>Detail Mata Kuliah</p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link to="/home/pembentukanmatkul" class="nav-link">
                                <i class="nav-icon fas fa-folder-open"></i>
                                <p>Pembentukan Mata Kuliah</p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <router-link to="/home/distribusimatkul" class="nav-link">
                                <i class="nav-icon fas fa-users"></i>
                                <p>Distribusi Mata Kuliah</p>
                            </router-link>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt red"></i>
                                <p>Logout</p>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;"> @csrf
                            </form>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <router-view></router-view>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->

            <!-- Default to the left -->
            <strong>Copyright &copy; 2021 Desain Kurikulum Perguruan Tinggi.</strong>
        </footer>
    </div>

</body>

</html>