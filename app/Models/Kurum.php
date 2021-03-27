<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurum extends Model
{
    protected $table = 'kurum';


    public function getStudents()
    {
        return $this->hasMany('\App\Models\Ogrenci','kurumId','id');
    }
    public function getPersonel()
    {
        return $this->hasMany('\App\Models\Personel','kurumId','id');
    }
    use HasFactory;

}
