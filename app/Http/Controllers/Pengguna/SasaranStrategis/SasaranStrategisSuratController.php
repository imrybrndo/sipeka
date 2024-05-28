<?php

namespace App\Http\Controllers\Pengguna\SasaranStrategis;

use App\Http\Controllers\Controller;
use App\Models\SasaranStrategis;
use App\Models\SasaranStrategisSurat;
use Illuminate\Http\Request;

class SasaranStrategisSuratController extends Controller
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
        $this->validate($request,[
            'sasaranStrategis.*' => 'required'
        ]);
        $data = $request->all();
        foreach ($data['sasaranStrategis'] as $key => $value) {
            $sasaranStrategis = new SasaranStrategisSurat();
            $sasaranStrategis->sasaranStrategis = $value;
            $sasaranStrategis->idTujuan = $request->idSurat;
            $sasaranStrategis->idSurat = $request->idSurat;
            $sasaranStrategis->idPd = auth()->user()->id;
            $sasaranStrategis->save();
        }
        return redirect()->route('surat.index')->with('toast_success', 'Berhasil!');
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
