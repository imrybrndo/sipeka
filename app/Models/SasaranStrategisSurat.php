<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SasaranStrategisSurat extends Model
{
    use HasFactory;
    protected $fillable = [
        'sasaranStrategis',
        'idSurat',
        'idTujuan',
        'idPd',
    ];
    /**
     * Get the user that owns the SuratPerjanjian
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sasaran(): BelongsTo
    {
        return $this->belongsTo(Tujuan::class, 'id',);
    }

    /**
     * Get the indikator associated with the SasaranStrategisSurat
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function indikator(): HasOne
    {
        return $this->hasOne(IndikatorSurat::class, 'idSasaran');
    }
}
