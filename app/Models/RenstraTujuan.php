<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RenstraTujuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'tujuan',
        'idPd'
    ];

    public function sasaran(): HasMany
    {
        return $this->hasMany(SasaranRenstra::class, 'idRenstra');
    }
}
