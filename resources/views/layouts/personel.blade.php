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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('head.datatable')
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->



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
                                        width="100" alt="profil">
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
                                    <i class="fa fa-fw fa-user-circle"></i>Hesap Ayarlar?? <span
                                        class="badge badge-success"></span>
                                </a>

                                <div id="submenu-1" class="collapse submenu user2" style="">
                                    <ul class="nav flex-column">

                                        <li class="nav-item">
                                        <li class="nav-item">
                                            <div class="baslik">Mail</div>
                                            <div>{{ session()->get('personel')->mail }}</div>
                                        </li>
                            </li>
                            <li class="nav-item">
                            <li class="nav-item">
                                <div class="baslik">Yetki</div>
                                <div>Personel</div>
                            </li>
                            </li>
                            <li class="nav-item">
                            <li class="nav-item">
                                <div class="baslik">Kurum</div>
                                <div>{{ session()->get('personel')->personelToKurum->kurumAdi }}</div>
                            </li>
                            </li>

                            <li class="nav-item">
                            <li class="nav-item">
                                <a href="{{ route('personel.hesapAyarlari') }}" class="nav-link"><i
                                        class="fas fa-cogs"></i>Hesap Ayarlar?? D??zenle</a>
                            </li>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('personel.logout') }}" class="nav-link"><i
                                        class="far fa-times-circle "></i>????k????</a>
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
                        <i class="fa fa-fw fa-user-circle"></i>????renci ????lemleri <span
                            class="badge badge-success"></span>
                    </a>

                    <div id="submenu-2" class="collapse submenu" style="">
                        <ul class="nav flex-column">

                            @if (json_decode(session()->get('personel')->yetki)->ogrenciEkle)
                                <li class="nav-item">
                                    <a href="{{ route('personel.ogrenciEkle') }}" class="nav-link @if (Request::segment(2)=='ogrenci-ekle' ) active @endif"><i class="fas fa-user-plus"></i>????renci Kay??t</a>
                                </li>
                            @endif


                            <li class="nav-item">
                                <a href="{{ Route('personel.ogrenciListele') }}" class="nav-link @if (Request::segment(2)=='ogrenci-listele' ) active @endif"><i class="fas fa-clipboard-list"></i>????renci Listesi</a>
                            </li>

                            @if (json_decode(session()->get('personel')->yetki)->binaEkle)
                                <li class="nav-item">
                                    <a href="{{ route('personel.odaSayfasi') }}" class="nav-link @if (Request::segment(2)=='oda-islemleri' ) active @endif"><i class="fas fa-user-plus"></i>Oda ????lemleri</a>
                                </li>
                            @endif


                        </ul>
                    </div>


                    <a class="nav-link @if (Request::segment(2)=='personel-ekle' ||
                        Request::segment(2)=='personel-listele' ) active @endif" href="#"
                        data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3">
                        <i class="fa fa-fw fa-user-circle"></i>Personel ????lemleri <span
                            class="badge badge-success"></span>
                    </a>

                    <div id="submenu-3" class="collapse submenu" style="">
                        <ul class="nav flex-column">

                            <li class="nav-item">
                                <a href="{{ route('personel.personelEkle') }}" class="nav-link @if (Request::segment(2)=='personel-ekle' ) active @endif"><i class="fas fa-user-plus"></i>Personel Kay??t</a>
                            </li>



                            <li class="nav-item">
                                <a href="{{ Route('personel.personelListele') }}" class="nav-link @if (Request::segment(2)=='personel-listele' ) active @endif"><i class="fas fa-clipboard-list"></i>Personel Listesi</a>
                            </li>

                            <li class="nav-item">
                                <a href="{{ Route('personel.personelYetkilendirme') }}" class="nav-link @if (Request::segment(2)=='personel-yetkilendirme' ) active @endif"><i class="fas fa-clipboard-list"></i>Personel
                                    Yetkilendirme</a>
                            </li>


                        </ul>
                    </div>

                    <li class="nav-item">
                        <a href="{{ route('personel.istekTalepList') }}" class="nav-link @if (Request::segment(2)=='istek-talep-list' ) active @endif"><i
                                class="fas fa-exclamation"></i>??stek / ??ikayet Takip</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('personel.binaListele') }}" class="nav-link @if (Request::segment(2)=='izin-talep' ) active @endif"><i
                                class="far fa-calendar-alt "></i>Bina G??r??nt??le</a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('personel.ogrenciYoklama') }}" class="nav-link @if (Request::segment(2)=='ogrenci-yoklama' ) active @endif"><i
                                class="far fa-calendar-alt "></i>????renci Yoklama</a>
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
                        2021 ?? ????renci Yurt Otomasyon Sistemi
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
