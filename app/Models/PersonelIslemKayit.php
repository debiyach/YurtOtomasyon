<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonelIslemKayit extends Model
{
    protected $table = 'personelislem';

    public function personelToLog()
    {
        return $this->hasOne(IslemCesitleri::class, 'id', 'logId');
    }
    use HasFactory;
}
