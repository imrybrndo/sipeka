<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SasaranStrategisSurat extends Model
{
    use HasFactory;
    protected $fillable = [
        'sasaranStrategis',
        'kategori',
        'idTujuan',
        'idSurat',
        'idPd',
    ];
    /**
     * Get the user that owns the SuratPerjanjian
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    /**
     * Get the indikator associated with the SasaranStrategisSurat
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function indikator(): HasMany
    {
        return $this->hasMany(IndikatorSurat::class, 'idSasaran');
    }
}
