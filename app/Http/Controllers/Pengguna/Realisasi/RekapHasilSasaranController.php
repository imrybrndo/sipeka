<?php

namespace App\Http\Controllers\Pengguna\Realisasi;

use App\Http\Controllers\Controller;
use App\Models\SasaranStrategisSurat;
use App\Models\User;
use Illuminate\Http\Request;

class RekapHasilSasaranController extends Controller
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
        $userID = auth()->user()->id;
        $nilaiSasaran = SasaranStrategisSurat::where('idSurat', $id)->sum('nilai');
        $jumlahSasaran = SasaranStrategisSurat::where('idSurat', $id)->count();
        $hasilSasaranStrategis = $nilaiSasaran / $jumlahSasaran;
        $data = User::findOrFail($userID);
        $data->update([
            'capaianPd' => $hasilSasaranStrategis
        ]);
        return redirect()->route('realisasi.index')->with('toast_success', 'Berhasil!!');
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
