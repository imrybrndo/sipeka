<?php

namespace App\Http\Controllers\Pengguna\RealisasiProgram;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\RealisasiAnggaran;
use Illuminate\Http\Request;

class RealisasiProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengguna.program-realisasi.index');
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
        $programID = $request->input('idProgram');
        $dataProgram = Program::where('id', $programID)->first();

        $this->validate($request, [
            'namaProgram',
            'triwulan1',
            'triwulan2',
            'triwulan3',
            'triwulan4'
        ]);

        $t1 = $request->input('triwulan1');
        $t2 = $request->input('triwulan2');
        $t3 = $request->input('triwulan3');
        $t4 = $request->input('triwulan4');

        $result = $t1 + $t2 + $t3 + $t4;

        $nilaiRealisasi = $result / $dataProgram['targetAnggaran'] * 100;

        $programData = Program::where('id', $programID);

        $programData->update([
            'status' => 1
        ]);

        RealisasiAnggaran::create([
            'idProgram' => $programID,
            'realisasiFisik' => $dataProgram->namaProgram,
            'triwulan1' => $request->triwulan1,
            'triwulan2' => $request->triwulan2,
            'triwulan3' => $request->triwulan3,
            'triwulan4' => $request->triwulan4,
            'anggaran' => $result,
            'nilai' => $nilaiRealisasi,
            'idPd' => auth()->user()->id
        ]);

        return redirect()->route('program.index')->with('success', 'Realisasi berhasil ditambahkan, tekan tombol hitung realisasi untuk mengupdate nilai realisasinya!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $data = RealisasiAnggaran::findOrFail($id);
        $this->validate($request, [
            'namaProgram',
            'triwulan1',
            'triwulan2',
            'triwulan3',
            'triwulan4'
        ]);

        $t1 = $request->input('triwulan1');
        $t2 = $request->input('triwulan2');
        $t3 = $request->input('triwulan3');
        $t4 = $request->input('triwulan4');

        $result = $t1 + $t2 + $t3 + $t4;

        $data->update([
            'realisasiFisik' => $request->namaProgram,
            'triwulan1' => $request->triwulan1,
            'triwulan2' => $request->triwulan2,
            'triwulan3' => $request->triwulan3,
            'triwulan4' => $request->triwulan4,
            'anggaran' => $result,
            'status' => 0,
            'idPd' => auth()->user()->id
        ]);
        return redirect()->route('program.index')->with('success', 'Berhasil!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = RealisasiAnggaran::findOrFail($id);
        $data->delete();
        return redirect()->route('program.index')->with('success', 'Berhasil!');
    }
}
