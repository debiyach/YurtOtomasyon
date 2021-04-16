<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\OgrenciDataTable;
class deneme extends Controller
{
    public function index(OgrenciDataTable $dataTable){
        return $dataTable->render('personel.deneme');
    }
}
