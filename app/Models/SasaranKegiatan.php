<?php

namespace App\Models;

use App\Http\Controllers\Pengguna\Cascading\SasaranLimaController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranKegiatan extends Model
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
        return $this->hasOne(SasaranProgram::class, 'key', 'parent');
    }

    public function sasaranLima()
    {
        return $this->hasOne(SasaranLima::class, 'key', 'parent');
    }
}
