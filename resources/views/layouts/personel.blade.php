<!doctype html>
<html lang="en">

<head>
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
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav flex-column">
                        <li class="nav-divider">
                            Menu
                        </li>
                        {{-- <li class="nav-item ">
                            <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Dashboard <span class="badge badge-success">6</span></a>
                            <div id="submenu-1" class="collapse submenu" style="">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="index.html" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">E-Commerce</a>
                                        <div id="submenu-1-2" class="collapse submenu" style="">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../index.html">E Commerce Dashboard</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../ecommerce-product.html">Product List</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../ecommerce-product-single.html">Product Single</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../ecommerce-product-checkout.html">Product Checkout</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../dashboard-finance.html">Finance</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="../dashboard-sales.html">Sales</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-1" aria-controls="submenu-1-1">Infulencer</a>
                                        <div id="submenu-1-1" class="collapse submenu" style="">
                                            <ul class="nav flex-column">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../dashboard-influencer.html">Influencer</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../influencer-finder.html">Influencer Finder</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="../influencer-profile.html">Influencer Profile</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                        
                       
                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="fas fa-user-plus"></i>Yeni Öğrenci Kayıt</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="fas fa-exclamation"></i>İstek / Şikayet</a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link"><i class="far fa-calendar-alt "></i>İzin Talep</a>
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
            <div class="row">
               
                @yield('content')
                
            </div>
        </div>
        
        
        
        
        
        
        
        
        
        
        
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        
        
        <div class="footer ">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="text-md-right footer-links d-none d-sm-block">
                            <a href="javascript: void(0);">About</a>
                            <a href="javascript: void(0);">Support</a>
                            <a href="javascript: void(0);">Contact Us</a>
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
<script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
<script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
<script src="assets/libs/js/main-js.js"></script>
</body>

</html>