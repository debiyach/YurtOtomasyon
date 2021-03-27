@extends('layouts.login')
@section('content')


<div class="girissecim">

    <div class="card">
        <div class="card-header text-center">
            <a href="#" class="girisbaslik">PERSONEL GİRİŞ EKRANI</a>
            <span class="splash-description">Lütfen boş bırakmayın!</span>
        </div>
        
        <div class="card-body">
            
            <form action="#">
                
                <div class="form-group">
                    <label for="inputEmail">Email</label>

                    <input id="inputEmail" type="email" required class="form-control">
                </div>
               
                <div class="form-group">
                    <label for="inputPassword">Sifre</label>
                    <input id="inputPassword" type="password" required class="form-control">
                </div>
                
                    <input id="submit" type="submit" class="form-control" value="GİRİŞ">
            </form>

        </div>
    
    </div>

</div>


@endsection
@section('title','Yusuf Yurt Giriş')
