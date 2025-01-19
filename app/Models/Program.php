<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $fillable = [
        'namaProgram',
        'triwulan1',
        'triwulan2',
        'triwulan3',
        'triwulan4',
        'targetAnggaran',
        'anggaran',
        'status',
        'idPd'
    ];

}
