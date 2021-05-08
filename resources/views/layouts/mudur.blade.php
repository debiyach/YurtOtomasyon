<!doctype html>
<html lang="en">

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
                                        <div class="baslik">Ad - Soyad</div>
                                        <div>
                                            {{ session()->get('personel')->ad . ' ' . session()->get('personel')->soyad }}
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

                                        <li class="nav-item ">
                                            <div class="baslik">Mail</div>
                                            <div>{{ session()->get('personel')->mail }}</div>
                                        </li>

                                        <li class="nav-item ">
                                            <div class="baslik">Yetki</div>
                                            <div>Mudur</div>
                                        </li>

                                        <li class="nav-item ">
                                            <div class="baslik">Kurum</div>
                                            <div>{{ session()->get('personel')->kurumId }}</div>
                                        </li>

                                        <li class="nav-item">
                                        <li class="nav-item">
                                            <a href="{{ route('mudur.hesapAyarlari') }}" class="nav-link"><i
                                                    class="fas fa-cogs"></i>Hesap Ayarları Düzenle</a>
                                        </li>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('mudur.logout') }}" class="nav-link"><i
                                        class="far fa-times-circle "></i>Çıkış</a>
                            </li>
                        </ul>
                    </div>


                    </li>

                    <li class="nav-divider">
                        Menu
                    </li>

                    <a class="nav-link @if (Request::segment(2)=='ogrenci-ekle' ||
                        Request::segment(2)=='ogrenci-listele' || Request::segment(2)=='oda-islemleri' ) active @endif" href="#" data-toggle="collapse" aria-expanded="false"
                        data-target="#submenu-2" aria-controls="submenu-2">
                        <i class="fa fa-fw fa-user-circle"></i>Öğrenci İşlemleri <span
                            class="badge badge-success"></span>
                    </a>

                    <div id="submenu-2" class="collapse submenu" style="">
                        <ul class="nav flex-column">

                            <li class="nav-item">
                                <a href="{{ route('mudur.ogrenciEkle') }}" class="nav-link @if (Request::segment(2)=='ogrenci-ekle' ) active @endif"><i
                                        class="fas fa-user-plus"></i>Öğrenci Kayıt</a>
                            </li>


                            <li class="nav-item">
                                <a href="{{ Route('mudur.ogrenciListele') }}" class="nav-link @if (Request::segment(2)=='ogrenci-listele' ) active @endif"><i class="fas fa-clipboard-list"></i>Öğrenci Listesi</a>
                            </li>

                            <li class="nav-item">
                                <a href="#" class="nav-link @if (Request::segment(2)=='oda-islemleri' ) active @endif"><i class="fas fa-user-plus"></i>Oda İşlemleri</a>
                            </li>


                        </ul>
                    </div>


                    <a class="nav-link @if (Request::segment(2)=='personel-ekle' ||
                        Request::segment(2)=='personel-listele' ) active @endif" href="#"
                        data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3">
                        <i class="fa fa-fw fa-user-circle"></i>Personel İşlemleri <span
                            class="badge badge-success"></span>
                    </a>

                    <div id="submenu-3" class="collapse submenu" style="">
                        <ul class="nav flex-column">

                            <li class="nav-item">
                                <a href="{{ route('mudur.personelEkle') }}" class="nav-link @if (Request::segment(2)=='personel-ekle' ) active @endif"><i class="fas fa-user-plus"></i>Personel Kayıt</a>
                            </li>



                            <li class="nav-item">
                                <a href="{{ Route('mudur.personelListele') }}" class="nav-link @if (Request::segment(2)=='personel-listele' ) active @endif"><i class="fas fa-clipboard-list"></i>Personel Listesi</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ Route('mudur.personelYetkilendirme') }}" class="nav-link @if (Request::segment(2)=='personel-yetkilendirme' ) active @endif"><i class="fas fa-clipboard-list"></i>Personel
                                    Yetkilendirme</a>
                            </li>


                        </ul>
                    </div>

                    <li class="nav-item">
                        <a href="{{ route('mudur.istekTalepList') }}" class="nav-link @if (Request::segment(2)=='istek-talep-list' ) active @endif"><i
                                class="fas fa-exclamation"></i>İstek / Şikayet Takip</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('mudur.gelirGiderTablosu') }}" class="nav-link @if (Request::segment(2)=='istek-talep-list' ) active @endif"><i
                                class="fas fa-exclamation"></i>Gelir / Gider Tablosu</a>
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
    <script src="{{ asset('assets/libs/js/notify.js') }}"></script>
    @yield('script.datatable')
    @yield('script')
</body>

</html>
