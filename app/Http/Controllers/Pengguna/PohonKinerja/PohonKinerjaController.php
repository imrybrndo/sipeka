<?php

namespace App\Http\Controllers\Pengguna\PohonKinerja;

use App\Http\Controllers\Controller;
use App\Models\CasCadingTujuan;
use App\Models\SasaranKegiatan;
use App\Models\SasaranProgram;
use App\Models\SasaranStrategis;
use Illuminate\Http\Request;

class PohonKinerjaController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $tujuan = CasCadingTujuan::where('idPd', $id)->get();
        $array_tujuan = $tujuan->toArray();

        $ss = SasaranStrategis::where('idPd', $id)->get();
        $array_strategis = $ss->toArray();

        $sp = SasaranProgram::where('idPd', $id)->get();
        $array_program = $sp->toArray();

        $sk = SasaranKegiatan::where('idPd', $id)->get();
        $array_kegiatan = $sk->toArray();

        $merged_array = array_merge($array_tujuan, $array_strategis, $array_program, $array_kegiatan);
        $jsonData = json_encode($merged_array, JSON_PRETTY_PRINT);
        
        return view('pengguna.pohon.index', [
            'jsonData' => $jsonData
        ]);
    }
}
