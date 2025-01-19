<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IndikatorIku extends Model
{
    use HasFactory;
    protected $fillable = [
        'indikatorKinerja',
        'satuan',
        'alasan',
        'formulasi',
        'sumberData',
        'idSasaran',
        'idPd'
    ];
    public function sasaran(): BelongsTo
    {
        return $this->belongsTo(IndikatorKinerjaUtama::class, 'id');
    }
}
