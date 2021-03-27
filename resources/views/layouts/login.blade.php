<!doctype html>
<html>
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title','Yurt Giriş')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset("assets/vendor/bootstrap/css/bootstrap.min.css")}}">
    <link href="{{asset("assets/vendor/fonts/circular-std/style.css")}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset("assets/libs/css/style.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendor/fonts/fontawesome/css/fontawesome-all.css")}}">
    <link rel="stylesheet" href="{{asset("assets/vendor/bootstrap/css/minespecial.css")}}">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,900;1,400;1,500&display=swap" rel="stylesheet">
    @yield('headTag')
    <style>
        *{
            font-family: 'Montserrat', sans-serif;
        }
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <div class="splash-container">
        @yield('content')
    </div>
  


    <script src="{{asset("assets/vendor/jquery/jquery-3.3.1.min.js")}}"></script>
    <script src="{{asset("assets/vendor/bootstrap/js/bootstrap.bundle.js")}}"></script>
</body>
</html>