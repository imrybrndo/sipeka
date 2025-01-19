<?php

namespace App\Http\Controllers\Pengguna\Renstra;

use App\Http\Controllers\Controller;
use App\Models\IndikatorRenstra as ModelsIndikatorRenstra;
use App\Models\SasaranRenstra;
use Illuminate\Http\Request;

class IndikatorRenstra extends Controller
{
    public function store(Request $request){
        $this->validate($request,[
            'indikatorRenstra.*' => 'required',
            'kinerjaRenstra.*' => 'required',
            'keuanganRenstra.*' => 'required',
        ]);
        $data = $request->all();
        foreach ($data['indikatorRenstra'] as $key => $value) {
            $indikatorRenstra = new ModelsIndikatorRenstra();
            $indikatorRenstra->indikatorRenstra = $value;
            $indikatorRenstra->kinerjaRenstra = $data['kinerjaRenstra'][$key];
            $indikatorRenstra->keuanganRenstra = $data['keuanganRenstra'][$key];
            $indikatorRenstra->idSasaran = $request->idSasaran;
            $indikatorRenstra->idPd = auth()->user()->id;
            $indikatorRenstra->save();
        }
        return redirect()->route('renstra.index')->with('success', 'Berhasil!');
    }

    public function destroy($id)
    {
        $data = ModelsIndikatorRenstra::findOrFail($id);
        $sasaran = SasaranRenstra::where('id', $data->idSasaran);
        $sasaran->delete();
        $data->delete();
        return redirect()->route('renstra.index')->with('success', 'Berhasil!!');
    }

}
