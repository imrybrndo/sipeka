<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SasaranKegiatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'key',
        'name',
        'parent',
        'idPd'
    ];
}