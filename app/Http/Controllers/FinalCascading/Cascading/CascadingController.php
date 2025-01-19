<?php

namespace App\Http\Controllers\FinalCascading\Cascading;

use App\Http\Controllers\Controller;
use App\Models\CascadingData;
use App\Models\CasCadingTujuan;
use App\Models\SasaranKegiatan;
use App\Models\SasaranProgram;
use App\Models\SasaranStrategis;
use Illuminate\Http\Request;

class CascadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $id = auth()->user()->id;
        $dataCascading = CascadingData::where('idPd', $id)->get();

        $tujuan = CasCadingTujuan::where('idPd', $id)->get();
        $sasaran = SasaranStrategis::where('idPd', $id)->get();
        $program = SasaranProgram::where('idPd', $id)->get();
        $kegiatan = SasaranKegiatan::where('idPd', $id)->get();

        $data = [
            'tujuan' => $tujuan,
            'sasaran' => $sasaran,
            'program' => $program,
            'kegiatan' => $kegiatan,
        ];

        $allItems = array_merge(
            $data['tujuan']->toArray(),
            $data['sasaran']->toArray(),
            $data['program']->toArray(),
            $data['kegiatan']->toArray()
        );

        return view('pengguna.cascading-data.index', [
            'dataCascading' => $dataCascading,
            'allItems' => $allItems
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
        $this->validate($request, [
            'dataCascading' => 'required'
        ]);
        CascadingData::create([
            'idPd' => auth()->user()->id,
            'dataCascading' => $request->dataCascading
        ]);
        return redirect()->route('cascading-data.index')->with('success', 'Berhasil!!');
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
        $data = CascadingData::findOrFail($id);
        $data->update([
            'level' => $request->level,
            'tipe' => $request->tipe
        ]);
        return redirect()->route('cascading-data.index')->with('success', 'Berhasil!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = CascadingData::findOrFail($id);
        $data->delete();
        return redirect()->route('cascading-data.index')->with('success', 'Berhasil!!');
    }
}
