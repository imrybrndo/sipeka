<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\CasCadingTujuan;
use App\Models\SasaranKegiatan;
use App\Models\SasaranProgram;
use App\Models\SasaranStrategis;
use App\Models\User;
use Illuminate\Http\Request;

class CascadingController extends Controller
{
    public function index()
    {
        $no = 1;
        $id = auth()->user()->id;
        $crossCut = User::where('tipePengguna', 'pengguna')->get();
        $tujuanCascading = CasCadingTujuan::where('idPd', $id)->get();
        $sasaranStrategis = SasaranStrategis::where('idPd', $id)->get();
        $sasaranProgram = SasaranProgram::where('idPd', $id)->get();
        $sasaranKegiatan = SasaranKegiatan::where('idPd', $id)->get();

        return view('pengguna.cascading.index', [
            'no' => $no,
            'id' => $id,
            'tujuanCascading' => $tujuanCascading,
            'strategis' => $sasaranStrategis,
            'program' => $sasaranProgram,
            'kegiatan' => $sasaranKegiatan,
            'crossCut' => $crossCut
        ]);
    }
}
