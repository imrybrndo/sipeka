<?php

namespace App\Http\Controllers\Walikota;

use App\Http\Controllers\Controller;
use App\Models\CasCadingTujuan;
use App\Models\Program;
use App\Models\SasaranKegiatan;
use App\Models\SasaranLima;
use App\Models\SasaranProgram;
use App\Models\SasaranStrategis;
use App\Models\SuratPerjanjian;
use App\Models\UploadPerjanjianKinerja;
use App\Models\User;
use Illuminate\Http\Request;

class DataSkpdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data = User::paginate(15);
        $search = $request->input('search');
        if ($search) {
            $data = User::search($search)->whereNotIn('id', [5, 53, 54, 57, 58])->paginate(15);
        } else {
            $data = User::search($search)->whereNotIn('id', [5, 53, 54, 57, 58])->paginate(15);
        }
        return view('walikota.skpd.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $dataUser = User::where('id', $id)->first();
        $dataSurat = UploadPerjanjianKinerja::where('idPd', $id)->first();

        $data = SuratPerjanjian::where('idPd', $id)->paginate(10);

        // $realisasiProgram = RealisasiAnggaran::where('idPd', $id)->paginate(15);
        $realisasiProgram = Program::where('idPd', $id)->paginate(15);

        //Data Pohon Kinerja
        // $id = auth()->user()->id;

        $tujuan = CasCadingTujuan::where('idPd', $id)->get();
        $array_tujuan = $tujuan->toArray();

        $ss = SasaranStrategis::where('idPd', $id)->get();
        $array_strategis = $ss->toArray();

        $sp = SasaranProgram::where('idPd', $id)->get();
        $array_program = $sp->toArray();

        $sk = SasaranKegiatan::where('idPd', $id)->get();
        $array_kegiatan = $sk->toArray();

        $sl = SasaranLima::where('idPd', $id)->get();
        $array_lima = $sl->toArray();

        $merged_array = array_merge($array_tujuan, $array_strategis, $array_program, $array_kegiatan, $array_lima);
        $jsonData = json_encode($merged_array, JSON_PRETTY_PRINT);

        return view('walikota.skpd.show', [
            'dataUser' => $dataUser,
            'dataSurat' => $dataSurat,
            'realisasiProgram' => $realisasiProgram,
            'data' => $data,
            'jsonData' => $jsonData
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
