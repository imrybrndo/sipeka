<?php

namespace App\Http\Controllers\Pengguna\Iku;

use App\Http\Controllers\Controller;
use App\Models\IndikatorIku;
use App\Models\IndikatorKinerjaUtama;
use Illuminate\Http\Request;

class IkuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = auth()->user()->id;
        $data = IndikatorKinerjaUtama::where('idPd', $id)->get();
        $sasaran = IndikatorIku::where('idPd', $id)->get();
        return view('pengguna.iku.index', [
            'no' => 1,
            'data' => $data,
            'sasaran' => $sasaran
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
            'sasaranStrategis' => 'required'
        ]);
        IndikatorKinerjaUtama::create([
            'sasaranStrategis' => $request->sasaranStrategis,
            'idPd' => auth()->user()->id
        ]);
        return redirect()->route('iku.index')->with('toast_success', 'Berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {}

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
