<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response(\App\Models\Kurum::find(95)->getStudents,'200');
});
Route::get('/ogrenci', function () {
    return view('ogrencigiris');
});
Route::get('/personel', function () {
    return view('personelgiris');
});
