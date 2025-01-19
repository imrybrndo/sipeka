<?php

namespace App\Http\Controllers\Pengguna\Iku;

use App\Http\Controllers\Controller;
use App\Models\IndikatorIku;
use Illuminate\Http\Request;

class IndikatorKinerjaController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
            'indikatorKinerja' => 'required',
            'satuan' => 'required',
            'alasan' => 'required',
            'formulasi' => 'required',
            'sumberData' => 'required'
        ]);
        IndikatorIku::create([
            'indikatorKinerja' => $request->indikatorKinerja,
            'satuan' => $request->satuan,
            'alasan' => $request->alasan,
            'formulasi' => $request->formulasi,
            'sumberData' => $request->sumberData,
            'idPd' => auth()->user()->id,
            'idSasaran' => $request->idSasaran
        ]);
        return redirect()->route('iku.index')->with('toast_success', 'Berhasil!');
    }
}
