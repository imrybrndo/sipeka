<?php

namespace App\Http\Controllers\Pengguna\Iku;

use App\Http\Controllers\Controller;
use App\Models\IndikatorKinerjaUtama;
use Illuminate\Http\Request;

class IkuPreviewController extends Controller
{
    public function show($id)
    {
        $no = 1;
        $id = auth()->user()->id;
        $data = IndikatorKinerjaUtama::with('indikator')->where('idPd', $id)->get();
        $arr = $data->toArray();
        return view('pengguna.iku.preview', [
            'no' => $no,
            'arr' => $arr,
        ]);
    }
}
