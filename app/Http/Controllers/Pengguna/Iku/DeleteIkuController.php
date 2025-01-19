<?php

namespace App\Http\Controllers\Pengguna\Iku;

use App\Http\Controllers\Controller;
use App\Models\IndikatorIku;
use App\Models\IndikatorKinerjaUtama;

class DeleteIkuController extends Controller
{
    public function delete($id)
    {
        $dataIku = IndikatorKinerjaUtama::find($id);
        if (!$dataIku) {
            return redirect()->route('iku.index')->with('toast_success', 'Data tujuan tidak ditemukan');
        }
        $indikatorIku = IndikatorIku::where('idSasaran', $dataIku->id)->first();
        if (!$indikatorIku) {
            $dataIku->delete();
            return redirect()->route('iku.index')->with('toast_success', 'Berhasil!!');
        }
        $dataIku->delete();
        $indikatorIku->delete();
        return redirect()->route('iku.index')->with('toast_success', 'Berhasil!!');
    }
}
