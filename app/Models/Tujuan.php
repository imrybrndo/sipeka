<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tujuan extends Model
{
    use HasFactory;
    protected $fillable = [
        'tujuan',
        'idSurat',
        'idPd'
    ];
    /**
     * Get all of the comments for the Tujuan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sasaran(): HasMany
    {
        return $this->hasMany(SasaranStrategisSurat::class, 'idTujuan');
    }
}

