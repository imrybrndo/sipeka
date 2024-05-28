<?php

namespace App\Http\Controllers\Pengguna\Tujuan;

use App\Http\Controllers\Controller;
use App\Models\Tujuan;
use Illuminate\Http\Request;

class TujuanSuratPerjanjianController extends Controller
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
            'tujuan.*' => 'required',
            'idSurat' => 'required',
        ]);
        $data = $request->all();
        foreach ($data['tujuan'] as $key => $value) {
            $tujuan = new Tujuan();
            $tujuan->tujuan = $value;
            $tujuan->idSurat = $request->idSurat;
            $tujuan->idPd = auth()->user()->id;
            $tujuan->save();
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
