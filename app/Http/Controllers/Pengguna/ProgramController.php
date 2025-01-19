<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Program;
use App\Models\RealisasiAnggaran;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ProgramController extends Controller
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

        $realisasi = RealisasiAnggaran::where('idPd', $id)->get();

        $data = Program::where('idPd', $id)
            ->where(function ($query) use ($search) {
                $query->where('namaProgram', 'like', '%' . $search . '%')
                    ->orWhere('anggaran', 'like', '%' . $search . '%');
            })->paginate(10);


        $id = auth()->user()->id;
        $row = Pegawai::count();

        $grade = User::where('id', $id)->first();
        $result_grade = $grade->gradePd;
        $maxgrade = 100;
        $persentase = $result_grade / 200 * 100;
        $resultData = $persentase / 100;
        $first_digit = intval($persentase);

        $capaian = User::where('id', $id)->first();
        $hasilCapaian = $capaian->capaianPd;
        $result = ($hasilCapaian / $maxgrade) * 100;
        $two_digit = intval($result);

        return view('pengguna.program.index', [
            'no' => $no,
            'data' => $data,
            'program' => $realisasi,
            'row' => $row,
            'grade' => $first_digit,
            'capaianPd' => $two_digit,
            'result' => $resultData
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pengguna.program.create');
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
            'namaProgram' => 'required',
            'triwulan1' => 'required',
            'triwulan2' => 'required',
            'triwulan3' => 'required',
            'triwulan4' => 'required',
        ]);

        $t1 = $request->input('triwulan1');
        $t2 = $request->input('triwulan2');
        $t3 = $request->input('triwulan3');
        $t4 = $request->input('triwulan4');

        $result = $t1 + $t2 + $t3 + $t4;

        Program::create([
            'namaProgram' => $request->namaProgram,
            'targetAnggaran' => $request->targetAnggaran,
            'triwulan1' => $request->triwulan1,
            'triwulan2' => $request->triwulan2,
            'triwulan3' => $request->triwulan3,
            'triwulan4' => $request->triwulan4,
            'targetAnggaran' => $result,
            'anggaran' => $result,
            'idPd' => auth()->user()->id
        ]);
        return redirect()->route('program.index')->with('success', 'Berhasil!!');
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
        $this->validate($request, [
            'namaProgram' => 'required',
            'triwulan1' => 'required',
            'triwulan2' => 'required',
            'triwulan3' => 'required',
            'triwulan4' => 'required',
        ]);

        $t1 = $request->input('triwulan1');
        $t2 = $request->input('triwulan2');
        $t3 = $request->input('triwulan3');
        $t4 = $request->input('triwulan4');

        $result = $t1 + $t2 + $t3 + $t4;

        $data = Program::findOrFail($id);
        $dataRealisasi = RealisasiAnggaran::where('idProgram', $data->id);
        $dataRealisasi->delete();

        $data->update([
            'namaProgram' => $request->namaProgram,
            'triwulan1' => $request->triwulan1,
            'triwulan2' => $request->triwulan2,
            'triwulan3' => $request->triwulan3,
            'triwulan4' => $request->triwulan4,
            'targetAnggaran' => $result,
            'anggaran' => $result,
            'status' => NULL,
            'idPd' => auth()->user()->id
        ]);
        return redirect()->route('program.index')->with('success', 'Berhasil!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $idProgram = $request->input('idProgram');

        $data = Program::findOrFail($id);
        $dataRealisasi = RealisasiAnggaran::where('idProgram', $idProgram);

        $dataRealisasi->delete();
        $data->delete();
        return redirect()->route('program.index')->with('success', 'Program berhasil dihapus!');
    }
}
