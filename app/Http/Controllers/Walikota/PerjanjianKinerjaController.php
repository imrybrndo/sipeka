<?php

namespace App\Http\Controllers\Walikota;

use App\Http\Controllers\Controller;
use App\Models\Indikator;
use App\Models\IndikatorSurat;
use App\Models\SasaranStrategisSurat;
use App\Models\SuratPerjanjian;
use Illuminate\Http\Request;

class PerjanjianKinerjaController extends Controller
{
    public function show(Request $request, $id)
    {
        $no = 1;
        $idSurat = $id;
        $idPd = $request->idPd;
        $data = SuratPerjanjian::where('idPd', $idPd)->get();
        $surat = SasaranStrategisSurat::with('indikator')->where('idSurat', $id)->get();
        $arr = $surat->toArray();
        $indikator = IndikatorSurat::where('idSurat', $id)->get();


        if (!$indikator) {
            return redirect()->route('realisasi_kegiatan.index')->with('warning', 'Belum ada indikator!!');
        }

        return view('walikota.kinerja.index', [
            'no' => $no,
            'data' => $data,
            'arr' => $arr,
            'indikator' => $indikator,
            'idSurat' => $idSurat
        ]);
    }
}
