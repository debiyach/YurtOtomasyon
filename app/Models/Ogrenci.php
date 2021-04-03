<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ogrenci extends Model
{
    protected $table = 'ogrenci';
    protected $fillable = ['ad','soyad','cinsiyet','telNo','foto','apiToken'];
    protected $hidden = ['tcNo','sifre','aidat','created_at','updated_at','izin','depozito','apiToken'];

    use HasFactory;
}
