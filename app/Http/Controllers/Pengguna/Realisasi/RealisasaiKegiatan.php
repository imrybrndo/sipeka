<?php

namespace App\Http\Controllers\Pengguna\Realisasi;

use App\Http\Controllers\Controller;
use App\Models\IndikatorSurat;
use App\Models\SasaranStrategisSurat;
use App\Models\SuratPerjanjian;
use App\Models\Tujuan;
use Illuminate\Http\Request;

class RealisasaiKegiatan extends Controller
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
        return view('pengguna.realisasi_kegiatan.index', ['data' => $data, 'tujuan' => $tujuan, 'sasaran' => $sasaran]);
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
    public function store(Request $request) {}

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
        $no = 1;
        $idSurat = $id;
        $idPd = auth()->user()->id;
        $data = SuratPerjanjian::where('idPd', $idPd)->get();
        $surat = SasaranStrategisSurat::with('indikator')->where('idSurat', $id)->get();
        $arr = $surat->toArray();
        $indikator = IndikatorSurat::where('idSurat', $id)->get();


        if (!$indikator) {
            return redirect()->route('realisasi_kegiatan.index')->with('success', 'Belum ada indikator!!');
        }

        return view('pengguna.realisasi_kegiatan.edit', [
            'no' => $no,
            'data' => $data,
            'arr' => $arr,
            'indikator' => $indikator,
            'idSurat' => $idSurat
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
        $this->validate($request, [
            'triwulan1' => 'required',
            'triwulan2' => 'required',
            'triwulan3' => 'required',
            'triwulan4' => 'required',
        ]);

        $idSurat = $request->input('idSurat');
        $target = $request->input('target');

        $countSurat = IndikatorSurat::where('idSasaran', $idSurat)->get()->toArray();
        foreach ($countSurat as $row) {
            $data = $row['nilai'];
        }

        $data = IndikatorSurat::where('id', $id);
        $t1 = $request->input('triwulan1');
        $t2 = $request->input('triwulan2');
        $t3 = $request->input('triwulan3');
        $t4 = $request->input('triwulan4');
        $result = $t1 + $t2 + $t3 + $t4;
        $finalResult = $result / $target * 100;

        $data->update([
            'triwulan1' => $request->triwulan1,
            'triwulan2' => $request->triwulan2,
            'triwulan3' => $request->triwulan3,
            'triwulan4' => $request->triwulan4,
            'nilai' => $finalResult
        ]);


        $sasaranId = $request->input('idSasaran');
        $sasaranNilai = IndikatorSurat::where('idSasaran', $sasaranId)->sum('nilai');
        $indikatorNilai = IndikatorSurat::where('idSasaran', $sasaranId)->count();
        $hasilSasaran = $sasaranNilai / $indikatorNilai;
        $strategisSasaran = SasaranStrategisSurat::where('id', $sasaranId);
        $strategisSasaran->update([
            'nilai' => $hasilSasaran
        ]);

        return redirect()->route('realisasi_kegiatan.index')->with('success', 'Berhasi menambahkan realisasi kegiatan, jangan lupa untuk update nilai realisasi kegiatan setelah mengubah atau menambahkannya!!');
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
