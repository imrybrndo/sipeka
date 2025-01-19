<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CascadingData extends Model
{
    use HasFactory;
    protected $fillable = [
        'dataCascading',
        'level',
        'tipe',
        'idPd'
    ];
}
