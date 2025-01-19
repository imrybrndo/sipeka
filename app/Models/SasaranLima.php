<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranLima extends Model
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

    public function sasaranKegiatan()
    {
        return $this->hasOne(SasaranKegiatan::class, 'key', 'parent');
    }
}
