<?php

namespace App\Http\Controllers\Pengguna\RealisasiProgram;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\RealisasiAnggaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RekapRealisasiProgram extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $userID = auth()->user()->id;
        $data = User::where('id', $userID);

        $dataRealisasi = RealisasiAnggaran::where('idPd', $userID)->count();
        $sumRealisasi = RealisasiAnggaran::where('idPd', $userID)->sum('nilai');

        if ($dataRealisasi == 1) {
            $resultRealisasi = $sumRealisasi / $dataRealisasi;
            $data->update([
                'gradePd' => $resultRealisasi
            ]);
        } else {
            $resultRealisasi = $sumRealisasi / $dataRealisasi;
            $data->update([
                'gradePd' => $resultRealisasi
            ]);
        }
        return redirect()->route('program.index')->with('success', 'Berhasil!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {}

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
        $id = auth()->user()->id;
        $program = Program::where('idPd', $id)->count();
        $realisasi = RealisasiAnggaran::where('idPd', $id)->count();
        if ($program == 1 && $realisasi == 1) {
            $dataProgram = Program::where('idPd', $id)->first();
            $dataRealisasi = RealisasiAnggaran::where('idPd', $id)->first();
            $getDataUser = User::findOrFail($id);
            $realisasiAnggaran = $dataRealisasi->anggaran;
            $anggaranProgram = $dataProgram->targetAnggaran;
            $result = $realisasiAnggaran / $anggaranProgram * 100;
            $finalResult = $result / 1;
            $getDataUser->update([
                'gradePd' => $finalResult
            ]);
        } else {

            $programData = Program::where('idPd', $id)->get();
            $realisasiData = RealisasiAnggaran::where('idPd', $id)->get();

            $joinedData = DB::table('programs')
                ->join('realisasi_anggarans', 'programs.id', '=', 'realisasi_anggarans.program_id')
                ->select('programs.*', 'realisasi_anggarans.realisasiFisik')
                ->get();

            dd($joinedData);
        }
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
