<?php

namespace App\Http\Controllers\Pengguna\Cascading;

use App\Http\Controllers\Controller;
use App\Models\CasCadingTujuan;
use App\Models\SasaranStrategis;
use Illuminate\Http\Request;

class SasaranStrategisController extends Controller
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
        $this->validate($request, [
            'sasaranStrategis.*' => 'required'
        ]);
        $existsData = SasaranStrategis::exists();
        if ($existsData) {
            $max_key = SasaranStrategis::max('key');
            foreach ($request->input('sasaranStrategis') as $strategis) {
                $max_key++;
                SasaranStrategis::create([
                    'key' => $max_key,
                    'name' => $strategis,
                    'parent' => $request->input('tujuan'),
                    'indikator' => $request->indikator,
                    'croscut' => $request->crosscut,
                    'idPd' => auth()->user()->id
                ]);
            }
        } elseif (!$existsData) {
            $sumSasaran = CasCadingTujuan::latest()->first();
            $lastkey = $sumSasaran ? $sumSasaran->key : 0;
            foreach ($request->input('sasaranStrategis') as $strategis) {
                $lastkey++;
                SasaranStrategis::create([
                    'key' => $lastkey,
                    'name' => $strategis,
                    'parent' => $request->input('tujuan'),
                    'indikator' => $request->indikator,
                    'croscut' => $request->crosscut,
                    'idPd' => auth()->user()->id
                ]);
            }
        }
        return redirect()->route('cascading.index')->with('toast_success', 'Sasaran strategis berhasil ditambah!');
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
        $data = SasaranStrategis::where('key', $id);
        $data->delete();
        return redirect()->route('cascading.index')->with('toast_success', 'Berhasil!!');
    }
}
