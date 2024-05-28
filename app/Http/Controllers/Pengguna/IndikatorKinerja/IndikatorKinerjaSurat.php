<?php

namespace App\Http\Controllers\Pengguna\IndikatorKinerja;

use App\Http\Controllers\Controller;
use App\Models\Indikator;
use App\Models\IndikatorSurat;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\New_;

class IndikatorKinerjaSurat extends Controller
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
            'indikatorKinerja.*' => 'required',
            'satuan.*' => 'required',
            'target.*' => 'required'
        ]);
        $data = $request->all();
        foreach ($data['indikatorKinerja'] as $index => $itemIndikator) {
            $indikatorKinerja = new IndikatorSurat();
            $indikatorKinerja->indikatorKinerja = $itemIndikator;
            $indikatorKinerja->satuan = $data['satuan'][$index];
            $indikatorKinerja->target = $data['target'][$index];
            $indikatorKinerja->idSasaran = $request->idSasaran;
            $indikatorKinerja->idSurat = $request->idSurat;
            $indikatorKinerja->idPd = auth()->user()->id;
            $indikatorKinerja->save();
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
