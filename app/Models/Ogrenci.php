<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema (
 *     title="Ogrenci",
 *     description="Ogrenci model"
 * )
 */

class Ogrenci extends Model
{
    protected $table = 'ogrenci';
    protected $fillable = ['ad','soyad','telNo','foto','apiToken','mail','sifre'];
    protected $hidden = ['tcNo','sifre','aidat','created_at','updated_at','izin','depozito','apiToken'];



    use HasFactory;
}
