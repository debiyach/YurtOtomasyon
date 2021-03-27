<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});
Route::get('/ogrenci', function () {
    return view('ogrencigiris');
});
Route::get('/personel', function () {
    return view('personelgiris');
});
