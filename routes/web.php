<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response(\App\Models\Kurum::find(95)->getStudents,'200');
});
