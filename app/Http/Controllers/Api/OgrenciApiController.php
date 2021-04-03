<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ogrenci;
use Illuminate\Http\Request;

class OgrenciApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Ogrenci::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ogrenci  $ogrenci
     * @return \Illuminate\Http\Response
     */
    public function show(Ogrenci $ogrenci)
    {
        return $ogrenci;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ogrenci  $ogrenci
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ogrenci $ogrenci)
    {
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ogrenci  $ogrenci
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ogrenci $ogrenci)
    {
        //
    }
}
