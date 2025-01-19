<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranProgram extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'name',
        'parent',
        'indikator',
        'croscut',
        'idPd'
    ];

    public function sasaranStrategis()
    {
        return $this->hasOne(SasaranStrategis::class, 'key', 'parent');
    }

    public function sasaranKegiatan()
    {
        return $this->hasOne(SasaranKegiatan::class, 'parent', 'key');
    }
}
