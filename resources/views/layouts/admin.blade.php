<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('assetss/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assetss/css/all.min.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet" href="assets/css/nice-select.css">
    <link rel="stylesheet" href="assets/css/owl.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/flaticon.css"> -->
    <link rel="stylesheet" href="{{asset('assetss/css/jquery-ui.min.css')}}">
    <!-- <link rel="stylesheet" href="assets/css/main.css"> -->
    <link rel="stylesheet" href="{{asset('assetss/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('assetss/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('assetss/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assetss/css/all.min.css')}}">
    <!-- <link rel="stylesheet" href="css/index.css"> -->
    <title>Admin Panel</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* .navbar-brand h5 {
        color: #1e1e1e;
        text-transform: uppercase;
        font-size: 20px;
        font-weight: 900;
    }*/

        .dot {
            font-size: 44px;
            font-style: normal;
            color: #343a40;
        }

        .small-box {
            background-color: #343a40;
            color: #c2c7d0;
        }

        .brand-color {
            background-color: #343a40;
            color: #c2c7d0;
        }

        .card-title {
            font-size: 1.5rem !important;
        }

        .search-txt {
            font-size: 1.1rem;
            font-weight: 400;
        }

        .control-form {
            display: inline-block !important;
            width: 50% !important;
        }

        .card-header {
            padding-bottom: 0.5rem !important;
        }

        .card-title {
            font-size: 1.5rem !important;
        }

        .card {
            border: none !important;
        }

        .data-info {
            padding-top: .85em;
        }

        .page-link {
            color: #343a40 !important;
        }

        .page-item.active .page-link {
            background-color: #343a40 !important;
            border-color: #343a40 !important;
            color: #c2c7d0 !important;
        }

        .ul-pagination {
            margin: 2px 0;
            white-space: nowrap;
            justify-content: flex-end;
        }

        .btn-add {
            background: #fff;
            color: #343a40 !important;
            border-color: #343a40 !important;
        }

        .btn-add:hover {
            background: #343a40;
            color: #c2c7d0 !important;
        }

        .btn-outline-info.focus,
        .btn-outline-info:focus {
            box-shadow: 0 0 0 0 !important;
        }
    </style>
</head>

<body>
    <div style="background:  lightblue;">
        <!-- Navbar -->

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        <!-- Sidebar user panel (optional) -->
                        <div class="user-panel mt-3 pb-3 mb-3 d-flex" style="margin-top:1900px">
                            <div class="image text-light pt-2">
                                <i class="fas fa-user-circle" style="font-size: 30px;"></i>
                            </div>
                            <div class="info">
                                <a href="#" class="d-block" style="font-size: 20px;"></a>
                            </div>
                        </div>
                        <!-- Sidebar Menu -->
                        <nav class="mt-2">
                            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                data-accordion="false">
                                <li class="nav-item menu-open mb-3 pb-3 user-panel">
                                    <a class="nav-link" href="{{route("admin.home")}}">
                                        <i class="nav-icon fas fa-user"></i>Dashboard
                                    </a>
                                </li>
                                <li class="nav-item menu-open mb-3 pb-3 user-panel">
                                    <a class="nav-link" href="{{route("personalProfile")}}">
                                        <i class="nav-icon fas fa-user"></i>All Student
                                    </a>
                                </li>
                                <li class="nav-item menu-open mb-3 pb-3 user-panel">
                                    <a class="nav-link" href="{{route("admin.schedules")}}">
                                        <i class="nav-icon fas fa-folder"></i>Student Date
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- /.sidebar-menu -->
                    </div>
                </div>
                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>

        </div>
    </div>
    <script src="../assetss/js/jquery-3.3.1.min.js"></script>
    <!-- <script src="assets/js/modernizr-3.6.0.min.js"></script>
    <script src="assets/js/plugins.js"></script> -->
    <script src="../assetss/js/bootstrap.min.js"></script>
    <!-- <script src="assets/js/isotope.pkgd.min.js"></script>
    <script src="assets/js/wow.min.js"></script>
    <script src="assets/js/waypoints.js"></script>
    <script src="assets/js/nice-select.js"></script> -->
    <script src="../assetss/js/counterup.min.js"></script>
    <!-- <script src="assets/js/owl.min.js"></script>
    <script src="assets/js/magnific-popup.min.js"></script>
    <script src="assets/js/yscountdown.min.js"></script> -->
    <script src="../assetss/js/jquery-ui.min.js"></script>
    <!-- <script src="assets/js/main.js"></script> -->

    <script src="../assetss/js/adminlte.min.js"></script>
    <!-- <script src="../js/jquery.js"></script>
    <script src="../js/popper.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/adminlte.min.js"></script> -->
</body>

</html>
