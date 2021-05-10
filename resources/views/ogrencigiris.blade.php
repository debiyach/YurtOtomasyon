@extends('layouts.login')
@section('content')


    <div class="girissecim">

        <div class="card">
            <a href="{{ route('girisKontrol') }}" class="geri">
                <i class="far fa-arrow-alt-circle-left fa-3x"></i>
            </a>

            <div class="card-header text-center">

                <a href="#" class="girisbaslik">ÖĞRENCİ GİRİŞ EKRANI</a>
                <span class="splash-description">Lütfen boş bırakmayın!</span>
            </div>

            <div class="card-body">
                @include('layouts.components.errors')
                <form action="{{ route('ogrenciLogin') }}" method="POST">

                    @csrf

                    <div class="form-group">
                        <label for="inputEmail">Email</label>

                        <input name="email" type="email" required class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="inputPassword">Sifre</label>
                        <input name="password" type="password" required class="form-control">
                    </div>

                    <input id="submit" type="submit" class="form-control" value="GİRİŞ">
                </form>

            </div>

        </div>

    </div>


@endsection
@section('title', 'Öğrenci Yurt Giriş')
