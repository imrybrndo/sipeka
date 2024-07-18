<?php

namespace App\Http\Controllers\Pengguna\CascadingDetail;

use App\Http\Controllers\Controller;
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
        $no = 1;
        $id = auth()->user()->id;
        $tujuan = CasCadingTujuan::where('idPd', $id)->get();
        $sasaran = SasaranStrategis::where('idPd', $id)->get();
        $program = SasaranProgram::where('idPd', $id)->get();
        $kegiatan = SasaranKegiatan::where('idPd', $id)->get();
        return view('pengguna.detail.index', [
            'no' => $no,
            'id' => $id,
            'tujuan' => $tujuan,
            'sasaran' => $sasaran,
            'program' => $program,
            'kegiatan' => $kegiatan
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
    public function update(Request $request, $key)
    {
        if ($request->input('kategori') == 'tujuan') {
            $data = CasCadingTujuan::where('key', $key);
            $data->update([
                'name' => $request->tujuan
            ]);
        } elseif ($request->input('kategori') == 'sasaran') {
            $data = SasaranStrategis::where('key', $key);
            $data->update([
                'name' => $request->sasaran
            ]);
        } elseif ($request->input('kategori') == 'program') {
            $data = SasaranProgram::where('key', $key);
            $data->update([
                'name' => $request->program
            ]);
        } elseif ($request->input('kategori') == 'kegiatan') {
            $data = SasaranKegiatan::where('key', $key);
            $data->update([
                'name' => $request->kegiatan
            ]);
        }
        return redirect()->route('cascading_detail.index')->with('toast_success', 'Berhasil!');
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
