<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranStrategis extends Model
{
    use HasFactory;
    protected $fillable = [
        'sasaranStrategis',
        'idSurat',
        'idPengguna',
        'idPd'
    ];
}
