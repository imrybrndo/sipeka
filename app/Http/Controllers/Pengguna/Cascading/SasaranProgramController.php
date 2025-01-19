<?php

namespace App\Http\Controllers\Pengguna\Cascading;

use App\Http\Controllers\Controller;
use App\Models\SasaranProgram;
use App\Models\SasaranStrategis;
use Illuminate\Http\Request;

class SasaranProgramController extends Controller
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
            'sasaranProgram.*' => 'required'
        ]);
        $existData = SasaranProgram::exists();
        if ($existData) {
            $max_key = SasaranProgram::max('key');
            foreach ($request->input('sasaranProgram') as $program) {
                $max_key++;
                SasaranProgram::create([
                    'key' => $max_key,
                    'name' => $program,
                    'parent' => $request->input('sasaranStrategis'),
                    'indikator' => $request->indikator,
                    'croscut' => $request->crosscut,
                    'idPd' => auth()->user()->id
                ]);
            }
        } elseif (!$existData) {
            $lastkey = SasaranStrategis::max('key');
            foreach ($request->input('sasaranProgram') as $program) {
                $lastkey++;
                SasaranProgram::create([
                    'key' => $lastkey,
                    'name' => $program,
                    'parent' => $request->input('sasaranStrategis'),
                    'indikator' => $request->indikator,
                    'croscut' => $request->crosscut,
                    'idPd' => auth()->user()->id
                ]);
            }
        }
        return redirect()->route('cascading.index')->with('success', 'Berhasil!!');
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
        $data = SasaranProgram::where('key', $id);
        $data->delete();
        return redirect()->route('cascading.index')->with('toast_success', 'Berhasil!!');
    }
}
