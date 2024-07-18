<?php

namespace App\Http\Controllers\Pengguna\Realisasi;

use App\Http\Controllers\Controller;
use App\Models\IndikatorSurat;
use App\Models\RealisasiAnggaran;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $no = 1;
        $id = auth()->user()->id;
        $search = $request->input('search');
        $data = RealisasiAnggaran::where('idPd', $id)
            ->where(function ($query) use ($search) {
                $query->where('realisasiFisik', 'LIKE', '%' . $search . '%')
                    ->orWhere('triwulan1', 'LIKE', '%' . $search . '%');
            })->paginate(10);
        return view('pengguna.realisasi.index', [
            'data' => $data,
            'no' => $no
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.realisasi.create');
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
            'realisasiFisik' => 'required',
            'triwulan1' => 'required',
            'triwulan2' => 'required',
            'triwulan3' => 'required',
            'triwulan4' => 'required',
            'anggaran' => 'required'
        ]);

        $tw1 = $request->input('triwulan1');
        $tw2 = $request->input('triwulan2');
        $tw3 = $request->input('triwulan3');
        $tw4 = $request->input('triuwlan4');
        $anggaran = $request->input('anggaran');
        $result = $tw1 + $tw2 + $tw3 + $tw4;
        $hasil = $anggaran / $result;
        RealisasiAnggaran::create([
            'realisasiFisik' => $request->realisasiFisik,
            'triwulan1' => $request->triwulan1,
            'triwulan2' => $request->triwulan2,
            'triwulan3' => $request->triwulan3,
            'triwulan4' => $request->triwulan4,
            'anggaran' => $request->anggaran,
            'nilai' => $hasil,
            'idPd' => auth()->user()->id
        ]);
        return redirect()->route('realisasi.index')->with('toast_success', 'Berhasil!!');
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
    public function edit(Request $request, $id)
    {
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
        $this->validate($request, [
            'realisasiFisik' => 'required',
            'triwulan1' => 'required',
            'triwulan2' => 'required',
            'triwulan3' => 'required',
            'triwulan4' => 'required',
            'anggaran' => 'required'
        ]);

        $data = RealisasiAnggaran::findOrFail($id);
        $data->update([
            'realisasiFisik' => $request->realisasiFisik,
            'triwulan1' => $request->triwulan1,
            'triwulan2' => $request->triwulan2,
            'triwulan3' => $request->triwulan3,
            'triwulan4' => $request->triwulan4,
            'anggaran' => $request->anggaran
        ]);

        return redirect()->route('realisasi.index')->with('toast_success', 'Berhasil!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = RealisasiAnggaran::findOrFail($id);
        $data->delete();
        return redirect()->route('realisasi.index')->with('toast_success', 'Berhasil!!');
    }
}
