<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\IndikatorTujuan;
use App\Models\Pegawai;
use App\Models\SasaranStrategis;
use App\Models\Tujuan;
use Illuminate\Http\Request;

class SuratPerjanjianKinerja extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pengguna.perjanjian.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Pegawai::all();
        return view('pengguna.perjanjian.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // VALIDASI SURAT
        $this->validate($request, [
            'tujuan.*' => 'required',
            'indikatorTujuan.*' => 'required',
            'sasaranStrategis.*' => 'required'
        ]);
        $data = $request->all();
        $lastIdSurat = Tujuan::max('idSurat');
        $nextIdSurat = $lastIdSurat + 1;
        foreach ($data['tujuan'] as $key => $value) {
            $tujuan = new Tujuan();
            $tujuan->tujuan = $value;
            $tujuan->idSurat = $nextIdSurat;
            $tujuan->idPengguna = $request->input('namaPegawai');
            $tujuan->idPd = auth()->user()->id;
            $tujuan->save();
        }

        $lasIdSuratIndikatorTujuan = IndikatorTujuan::max('idSurat');
        $nextIdSuratIndikatorTujuan = $lasIdSuratIndikatorTujuan + 1;
        foreach ($data['indikatorTujuan'] as $itemIndikatorTujuan) {
            $indikatorTujuan = new IndikatorTujuan();
            $indikatorTujuan->indikatorTujuan = $itemIndikatorTujuan;
            $indikatorTujuan->idSurat = $nextIdSuratIndikatorTujuan;
            $indikatorTujuan->idPengguna = $request->input('namaPegawai');
            $indikatorTujuan->idPd = auth()->user()->id;
            $indikatorTujuan->save();
        }

        $lastIdSasaranStrategis = SasaranStrategis::max('idSurat');
        $nextIdSasaranStrategis = $lastIdSasaranStrategis + 1;
        foreach ($data['sasaranStrategis'] as $itemSasaranStrategis) {
            $sasaranStrategis = new SasaranStrategis();
            $sasaranStrategis->sasaranStrategis = $itemSasaranStrategis;
            $sasaranStrategis->idSurat = $nextIdSasaranStrategis;
            $sasaranStrategis->idPengguna = $request->input('namaPegawai');
            $sasaranStrategis->idPd = auth()->user()->id;
            $sasaranStrategis->save();
        }


        return redirect()->route('kinerja.index')->with('success_toast', 'Surat berhasil dibuat!!');
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
