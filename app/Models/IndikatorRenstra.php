<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IndikatorRenstra extends Model
{
    use HasFactory;
    protected $fillable = [
        'indikatorRenstra',
        'kinerjaRenstra',
        'keuanganRenstra',
        'idPd',
        'idSasaran'
    ];
    public function sasaran(): BelongsTo
    {
        return $this->belongsTo(SasaranRenstra::class, 'id');
    }
}
