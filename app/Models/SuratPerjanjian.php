<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuratPerjanjian extends Model
{
    use HasFactory;
    protected $fillable = [
        'pihakPertama',
        'jabatanPihakPertama',
        'pihakKedua',
        'jabatanPihakKedua',
        'idPd'
    ];

}
