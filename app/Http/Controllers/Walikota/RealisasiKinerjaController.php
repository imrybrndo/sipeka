<?php

namespace App\Http\Controllers\Walikota;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\RealisasiAnggaran;
use Illuminate\Http\Request;

class RealisasiKinerjaController extends Controller
{
    public function show(Request $request, $id)
    {


        $userID = $request->idPd;
        $dataProgram = Program::where('idPd', $userID)
            ->where('id', $id)
            ->first();
        $dataRealisasi = RealisasiAnggaran::where('idPd', $userID)
            ->where('idProgram', $id)
            ->first();

        if (!$dataRealisasi) {
            return redirect()->route('detail-skpd.show', $userID)->with('warning', 'Realisasi pada program ini belum di isi.!');
        }

        return view('walikota.realisasi.index', [
            'dataProgram' => $dataProgram,
            'dataRealisasi' => $dataRealisasi
        ]);
    }
}
