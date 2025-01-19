<?php

namespace App\Http\Controllers\Pengguna\CetakSurat;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\SasaranStrategisSurat;
use App\Models\SuratPerjanjian;
use App\Models\User;
use Illuminate\Http\Request;

class CetakSuratController extends Controller
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
        $no = 1;
        $idUser = auth()->user()->id;
        $user = User::where('id', $idUser)->first();
        if ($user->alamat == NULL) {
            return redirect()->route('surat.index')->with('warning', 'Anda belum melengkapi alamat SKPD untuk mencetak perjanjian kinerja, silahkan lengkapi di profil!!');
        }
        $data = SuratPerjanjian::where('id', $id)->first();
        $surat = SasaranStrategisSurat::with('indikator')->where('idSurat', $id)->get();
        $program = Program::where('idPd', auth()->user()->id)->get();
        $arr = $surat->toArray();
        return view('pengguna.cetaksurat.index', [
            'no' => $no,
            'data' => $data,
            'surat' => $surat,
            'program' => $program,
            'user' => $user,
            'arr' => $arr
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
        //
    }
}
