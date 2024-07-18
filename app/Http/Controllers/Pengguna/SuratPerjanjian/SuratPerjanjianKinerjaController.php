<?php

namespace App\Http\Controllers\Pengguna\SuratPerjanjian;

use App\Http\Controllers\Controller;
use App\Models\IndikatorSurat;
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
    public function index(Request $request)
    {
        $id = auth()->user()->id;
        // $data = SuratPerjanjian::where('idPd', $id)->get();
        $search = $request->input('search');
        $data = SuratPerjanjian::where('idPd', $id)
            ->where(function ($query) use ($search) {
                $query->where('pihakPertama', 'like', '%' . $search . '%')
                    ->orWhere('pihakKedua', 'like', '%' . $search . '%');
            })
            ->paginate(10);
        $tujuan = Tujuan::where('idPd', $id)->get();
        $sasaran = SasaranStrategisSurat::where('idPd', $id)->get();
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
            'jabatanPihakKedua' => $request->jabatanPihakKedua,
            'idPd' => auth()->user()->id
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
        $data = SuratPerjanjian::findOrFail($id);
        $sasaran = SasaranStrategisSurat::where('idSurat', $id)->get();
        $indikator = IndikatorSurat::where('idSurat', $id)->get();
        return view('pengguna.perjanjian.edit', [
            'data' => $data,
            'sasaran' => $sasaran,
            'indikator' => $indikator
        ]);
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
        $data = SuratPerjanjian::where('id', $id);
        $sasaran = SasaranStrategisSurat::where('idSurat', $id);
        $indikator = IndikatorSurat::where('idSurat', $id);
        $data->delete();
        $sasaran->delete();
        $indikator->delete();
        return redirect()->route('surat.index')->with('toast_success', 'Berhasil');
    }
}
