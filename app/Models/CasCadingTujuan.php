<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CasCadingTujuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'name',
        'indikator',
        'croscut',
        'parent',
        'idPd'
    ];

    public function sasaranStrategis()
    {
        return $this->hasMany(SasaranStrategis::class, 'parent', 'key');
    }

}
