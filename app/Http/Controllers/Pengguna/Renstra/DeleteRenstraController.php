<?php

namespace App\Http\Controllers\Pengguna\Renstra;

use App\Http\Controllers\Controller;
use App\Models\IndikatorRenstra;
use App\Models\RenstraTujuan;
use App\Models\SasaranRenstra;


class DeleteRenstraController extends Controller
{
    public function destroy($id)
    {
        $tujuan = RenstraTujuan::find($id);
        if (!$tujuan) {
            return redirect()->route('renstra.index')->with('toast_success', 'Data tujuan tidak ditemukan');
        }
        $sasaran = SasaranRenstra::where('idRenstra', $tujuan->id)->first();
        if (!$sasaran) {
            $tujuan->delete();
            return redirect()->route('renstra.index')->with('toast_success', 'Berhasil!!');
        }
        $indikator = IndikatorRenstra::where('idSasaran', $sasaran->id)->first();
        if (!$indikator) {
            $sasaran->delete();
            return redirect()->route('renstra.index')->with('toast_success', 'Data indikator tidak ditemukan');
        }
        $tujuan->delete();
        $sasaran->delete();
        $indikator->delete();
        return redirect()->route('renstra.index')->with('toast_success', 'Data berhasil dihapus');
    }
}
