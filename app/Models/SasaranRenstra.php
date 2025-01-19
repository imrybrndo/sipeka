<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SasaranRenstra extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'sasaran',
        'idRenstra',
        'idPd'
    ];

    public function indikator(): HasMany
    {
        return $this->hasMany(IndikatorRenstra::class, 'idSasaran');
    }

    public function tujuan(): BelongsTo
    {
        return $this->belongsTo(RenstraTujuan::class, 'idRenstra');
    }
}
