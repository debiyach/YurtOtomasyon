<!doctype html>
<html lang="en">

<head>
<<<<<<< HEAD
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>@yield('title','Yurt otomasyon')</title>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="{{asset("assets/vendor/bootstrap/css/bootstrap.min.css")}}">
<link rel="stylesheet" href="{{asset("assets/vendor/fonts/circular-std/style.css")}}">
<link rel="stylesheet" href="{{asset("assets/libs/css/style.css")}}">
<link rel="stylesheet" href="{{asset("assets/vendor/fonts/fontawesome/css/fontawesome-all.css")}}">
<link rel="stylesheet" href="{{asset("assets/libs/css/mine.css")}}">



=======
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title','Yurt otomasyon')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/libs/css/mine.css">
    @yield('head.datatable')
    @yield('head')
>>>>>>> 3618060f6624b22f28bd48902b2d7fcd56249d7f
</head>

<body>
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
    <div class="dashboard-header ">
        <nav class="navbar navbar-expand-lg bg-white fixed-top  ">
            <div class="col-12  text-center">
                <h2 class="yurtAdi ">ogrenci yurdu adı</h2>

            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </nav>
    </div>
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    <div class="nav-left-sidebar  sidebar-dark">
        <div class="menu-list">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-divider">
                            Menu
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="far fa-calendar-alt "></i>İzin Talep</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="far fa-calendar-alt "></i>İstek/Şikayet Talep</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="far fa-times-circle "></i>Çıkış</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->


    <div class="dashboard-wrapper  d-flex flex-column justify-content-between">
        <div class="container-fluid dashboard-content">
            @yield('content')
        </div>


        <div class="footer ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.

                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- ============================================================== -->
    <!-- end footer -->
    <!-- ============================================================== -->
</div>
</div>


<!-- ============================================================== -->
<!-- end main wrapper -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<<<<<<< HEAD
<script src="{{asset("assets/vendor/jquery/jquery-3.3.1.min.js")}}"></script>
<script src="{{asset("assets/vendor/bootstrap/js/bootstrap.bundle.js")}}"></script>
<script src="{{asset("assets/vendor/slimscroll/jquery.slimscroll.js")}}"></script>
<script src="{{asset("assets/libs/js/main-js.js")}}"></script>
=======
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="assets/libs/js/main-js.js"></script>
@yield('script.datatable')
@yield('script')
>>>>>>> 3618060f6624b22f28bd48902b2d7fcd56249d7f
</body>
</html>
