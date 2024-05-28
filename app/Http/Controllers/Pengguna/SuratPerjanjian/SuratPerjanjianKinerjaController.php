<?php

namespace App\Http\Controllers\Pengguna\SuratPerjanjian;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\SasaranStrategisSurat;
use App\Models\SuratPerjanjian;
use App\Models\Tujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SuratPerjanjianKinerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SuratPerjanjian::all();
        $tujuan = Tujuan::all();
        $sasaran = SasaranStrategisSurat::all();
        return view('pengguna.perjanjian.index', [
            'data' => $data,
            'tujuan' => $tujuan,
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
        $data = Pegawai::all();
        return view('pengguna.perjanjian.create', compact('data'));
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
            'pihakPertama' => 'required',
            'jabatanPihakPertama' => 'required',
            'pihakKedua' => 'required',
            'jabatanPihakKedua' => 'required'
        ]);

        SuratPerjanjian::create([
            'pihakPertama' => $request->pihakPertama,
            'jabatanPihakPertama' => $request->jabatanPihakPertama,
            'pihakKedua' => $request->pihakKedua,
            'jabatanPihakKedua' => $request->jabatanPihakKedua
        ]);
        return redirect()->route('surat.index')->with('toast_success', 'Surat perjanjian berhasil dibuat!');
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
        $data = SuratPerjanjian::findOrFail($id);
        $data->delete();
        return redirect()->route('surat.index')->with('toast_success', 'Berhasil');
    }
}
