<?php

namespace App\Http\Controllers\Pengguna\RealisasiProgram;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\RealisasiAnggaran;
use Illuminate\Http\Request;

class DetailRealisasiProgram extends Controller
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

        $userID = auth()->user()->id;
        $dataProgram = Program::where('idPd', $userID)
            ->where('id', $id)
            ->first();
        $dataRealisasi = RealisasiAnggaran::where('idPd', $userID)
            ->where('idProgram', $id)
            ->first();

        if (!$dataRealisasi) {
            return redirect()->route('program.index')->with('warning', 'Realisasi pada program ini belum ada, silahkan isi terlebih dahulu!');
        }

        return view('pengguna.program.show', [
            'dataProgram' => $dataProgram,
            'dataRealisasi' => $dataRealisasi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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

        $data = RealisasiAnggaran::where('idProgram', $programID);

        $data->update([
            'triwulan1' => $request->triwulan1,
            'triwulan2' => $request->triwulan2,
            'triwulan3' => $request->triwulan3,
            'triwulan4' => $request->triwulan4,
            'anggaran' => $result,
            'nilai' => $nilaiRealisasi,
            'idPd' => auth()->user()->id
        ]);

        return redirect()->route('program.index')->with('success', 'Realisasi anggaran berhasil diubah, silahkan tekan tombol hitung realisasi untuk mengupdate realisasi anggaran!!');
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
