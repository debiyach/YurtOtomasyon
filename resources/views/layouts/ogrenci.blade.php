<!doctype html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title','Yurt otomasyon')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/circular-std/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/css/mine.css') }}">
    @yield('head.datatable')
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->



        <!-- ============================================================== -->


        {{-- <div class="dashboard-header">
        <nav class="navbar navbar-expand-lg bg-white fixed-top  ">
            <div class="col-12  text-center">
                <h2 class="yurtAdi ">ogrenci yurdu adı</h2>

            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </nav>
    </div> --}}

        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar  sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Panel</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">

                            <div class="user">
                                <div class="user-photo">
                                    <img src="https://st.depositphotos.com/2101611/3925/v/950/depositphotos_39258143-stock-illustration-businessman-avatar-profile-picture.jpg"
                                        alt="profil">
                                </div>
                                <ul>

                                    <li class="nav-item ">
                                        <div class="baslik">AD-SOYAD</div>
                                        <div>
                                            {{ session()->get('ogrenci')->ad . ' ' . session()->get('ogrenci')->soyad }}
                                        </div>
                                    </li>

                                </ul>
                            </div>

                            <li class="nav-divider">
                                Hesap
                            </li>

                            <li class="nav-item ">

                                <a class="nav-link @if (Request::segment(2)=='hesap-ayarlari' ) active @endif" href="#" data-toggle="collapse"
                                    aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1">
                                    <i class="fa fa-fw fa-user-circle"></i>Hesap Ayarları <span
                                        class="badge badge-success"></span>
                                </a>

                                <div id="submenu-1" class="collapse submenu user2" style="">
                                    <ul class="nav flex-column">

                                        <li class="nav-item">
                                        <li class="nav-item">
                                            <div class="baslik">Mail</div>
                                            <div>{{ session()->get('ogrenci')->mail }}</div>
                                        </li>
                            </li>
                            <li class="nav-item">
                            <li class="nav-item">
                                <div class="baslik">Yetki</div>
                                <div>Öğrenci</div>
                            </li>
                            </li>
                            <li class="nav-item">
                            <li class="nav-item">
                                <div class="baslik">Kurum</div>
                                <div>{{ session()->get('ogrenci')->kurumId }}</div>
                            </li>
                            </li>

                            <li class="nav-item">
                            <li class="nav-item">
                                <a href="{{ route('ogrenci.hesapAyarlari') }}" class="nav-link"><i
                                        class="fas fa-cogs"></i>Hesap Ayarları Düzenle</a>
                            </li>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('ogrenci.logout') }}" class="nav-link"><i
                                        class="far fa-times-circle "></i>Çıkış</a>
                            </li>



                        </ul>
                    </div>


                    </li>

                    <li class="nav-divider">
                        Menu
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('ogrenci.izinTalep') }}" class="nav-link @if (Request::segment(2)=='izin-talep' ) active @endif"><i
                                class="far fa-calendar-alt "></i>İzin Talep</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('ogrenci.istekTalep') }}" class="nav-link @if (Request::segment(2)=='istek-talep' ) active @endif"><i
                                class="far fa-calendar-alt "></i>İstek/Şikayet Talep</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('ogrenci.aidatListele') }}" class="nav-link @if (Request::segment(2)=='aidat-liste' ) active @endif"><i
                                class="far fa-calendar-alt "></i>Aidat Ödeme</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('ogrenci.devamsizlik') }}" class="nav-link @if (Request::segment(2)=='istek-talep' ) active @endif"><i
                                class="far fa-calendar-alt "></i>Devamsızlık Bilgisi</a>
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


        <div class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        2021 © Öğrenci Yurt Otomasyon Sistemi
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
    <script src="{{ asset('assets/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('assets/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <script src="{{ asset('assets/libs/js/main-js.js') }}"></script>
    @yield('script.datatable')
    @yield('script')
</body>

</html>
