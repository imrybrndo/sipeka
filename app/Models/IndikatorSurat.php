<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IndikatorSurat extends Model
{
    use HasFactory;
    protected $fillable = [
        'indikatorKinerja',
        'satuan',
        'target',
        'idSasaran',
        'idSurat',
        'idPd'
    ];
    /**
     * Get the sasaran that owns the IndikatorSurat
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sasaran(): BelongsTo
    {
        return $this->belongsTo(SasaranStrategisSurat::class, 'id');
    }
}
