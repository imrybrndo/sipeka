<?php

namespace App\Http\Controllers\Pengguna\Iku;

use App\Http\Controllers\Controller;
use App\Models\IndikatorIku;
use App\Models\IndikatorKinerjaUtama;
use Illuminate\Http\Request;

class UpdateIkuController extends Controller
{
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'sasaranStrategis' => 'required',
            'satuan' => 'required',
            'alasan' => 'required',
            'formulasi' => 'required',
            'sumberData' => 'required',
        ]);

        $idSasaran = $request->idSasaran;
        $idIndikator = $request->idIndikator;

        $dataSasaran = IndikatorKinerjaUtama::where('id', $idSasaran)->first();
        $dataSasaran->update([
            'sasaranStrategis' => $request->sasaranStrategis
        ]);

        $dataIndikator = IndikatorIku::where('id', $idIndikator)->first();
        $dataIndikator->update([
            'indikatorKinerja' => $request->indikatorKinerja,
            'satuan' => $request->satuan,
            'alasan' => $request->alasan,
            'formulasi' => $request->formulasi,
            'sumberData' => $request->sumberData
        ]);

        return redirect()->route('preview-iku', auth()->user()->id)->with('toast_success', 'Berhasil!');
    }
}
