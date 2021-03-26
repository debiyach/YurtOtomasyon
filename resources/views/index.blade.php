@extends('layouts.login')
@section('content')
<div class="card ">
    <div class="card-header text-center"><a href="../index.html"><img class="logo-img" src="../assets/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
    <div class="card-body">
        <form>
            <div class="form-group">
                <input class="form-control form-control-lg" id="username" type="text" placeholder="Username" autocomplete="off">
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" id="password" type="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                </label>
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
        </form>
    </div>
    <div class="card-footer bg-white p-0  ">
        <div class="card-footer-item card-footer-item-bordered">
            <a href="#" class="footer-link">Create An Account</a></div>
        <div class="card-footer-item card-footer-item-bordered">
            <a href="#" class="footer-link">Forgot Password</a>
        </div>
    </div>
</div>
@endsection
@section('title','Yusuf Yurt Giriş')
@section('script')
    <script >
        alert("koyamazlarki amına");
    </script>
@endsection