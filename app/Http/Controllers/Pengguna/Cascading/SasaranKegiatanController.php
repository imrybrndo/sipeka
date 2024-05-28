<?php

namespace App\Http\Controllers\Pengguna\Cascading;

use App\Http\Controllers\Controller;
use App\Models\SasaranKegiatan;
use App\Models\SasaranProgram;
use Illuminate\Http\Request;

class SasaranKegiatanController extends Controller
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
            'sasaranKegiatan.*' => 'required'
        ]);
        $lastKey = SasaranProgram::max('key');
        foreach ($request->input('sasaranKegiatan') as $kegiatan) {
            $lastKey++;
            SasaranKegiatan::create([
                'key' => $lastKey,
                'name' => $kegiatan,
                'parent' => $request->input('sasaranProgram'),
                'idPd' => auth()->user()->id
            ]);
        }
        return redirect()->route('cascading.index')->with('toast_success', 'Berhasil!!');
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
