<?php

namespace App\Http\Controllers\Personel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\DenemeDataTable;

class Listeleme extends Controller
{
    public function index(DenemeDataTable $dataTable){

        return $dataTable->render('personel.studentlist');

    }
}
