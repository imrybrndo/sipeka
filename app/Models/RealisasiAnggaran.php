<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RealisasiAnggaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'idProgram',
        'realisasiFisik',
        'triwulan1',
        'triwulan2',
        'triwulan3',
        'triwulan4',
        'anggaran',
        'nilai',
        'idPd'
    ];
}
