@extends('layouts.login')
@section('content')


<div class="girissecim">
    <div class="card">
        <div class="card-header text-center">
            <a href="#" class="girisbaslik">YURT SİSTEM GİRİŞ</a>
            <span class="splash-description">Lütfen Bir Giriş Seçiniz!</span>
        </div>

        <div class="card-body">
            <a href="{{route('ogrenciGiris')}}" class="btn girisbuton">Öğrenci Giriş</a>
            <a href="{{route('personelGiris')}}" class="btn girisbuton">Personel Giriş</a>
        </div>

    </div>
</div>


@endsection
@section('title','Yurt Giriş')
