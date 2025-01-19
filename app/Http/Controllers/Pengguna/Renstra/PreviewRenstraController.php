<?php

namespace App\Http\Controllers\Pengguna\Renstra;

use App\Http\Controllers\Controller;
use App\Models\SasaranRenstra;

class PreviewRenstraController extends Controller
{
    public function show($id)
    {
        $no = 1;
        $idUser = auth()->user()->id;
        $data = SasaranRenstra::with('indikator')->where('idPd', $idUser)->get();
        $arr = $data->toArray();
        return view('pengguna.renstra.preview', ['data' => $data, 'arr' => $arr, 'no' => $no]);
    }
}
