<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorTujuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'indikatorTujuan',
        'idSurat',
        'idPengguna',
        'idPd'
    ];
}
