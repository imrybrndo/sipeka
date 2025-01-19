<?php

namespace App\Http\Controllers\Pengguna\Renstra;

use App\Http\Controllers\Controller;
use App\Models\SasaranRenstra as ModelsSasaranRenstra;
use Illuminate\Http\Request;

class SasaranRenstra extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'sasaran.*' => 'required',
        ]);
        $data = $request->all();
        foreach ($data['sasaran'] as $key => $value) {
            $sasaran = new ModelsSasaranRenstra();
            $sasaran->sasaran = $value;
            $sasaran->idRenstra = $request->idRenstra;
            $sasaran->idPd = auth()->user()->id;
            $sasaran->save();
        }
        return redirect()->route('renstra.index')->with('toast_success', 'Berhasil!!');
    }
}
