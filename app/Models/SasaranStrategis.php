<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranStrategis extends Model
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

    public function sasaranProgram()
    {
        return $this->belongsTo(SasaranProgram::class, 'key', 'parent');
    }
}
