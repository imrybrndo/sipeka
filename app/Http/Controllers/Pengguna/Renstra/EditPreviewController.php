<?php

namespace App\Http\Controllers\Pengguna\Renstra;

use App\Http\Controllers\Controller;
use App\Models\IndikatorRenstra;
use App\Models\SasaranRenstra;
use Illuminate\Http\Request;

class EditPreviewController extends Controller
{
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sasaran' => 'required',
            'indikatorRenstra' => 'required',
            'kinerjaRenstra' => 'required',
            'keuanganRenstra' => 'required'
        ]);

        $idRenstra = $request->idSasaranRenstra;
        $idIndikator = $request->idIndikator;

        $dataRenstra = SasaranRenstra::where('id', $idRenstra)->first();
        $dataRenstra->update([
            'sasaran' => $request->sasaran
        ]);

        $dataIndikator = IndikatorRenstra::where('id', $idIndikator)->first();
        $dataIndikator->update([
            'indikatorRenstra' => $request->indikatorRenstra,
            'kinerjaRenstra' => $request->kinerjaRenstra,
            'keuanganRenstra' => $request->keuanganRenstra
        ]);

        return redirect()->route('preview-renstra', auth()->user()->id)->with('toast_success', 'Berhasil!');
    }
}
