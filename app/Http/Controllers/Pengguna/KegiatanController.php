<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Program;
use Illuminate\Http\Request;

class KegiatanController extends Controller
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
        $data = Kegiatan::where('idPd', $id)
            ->where(function ($query) use ($search) {
                $query->where('namaKegiatan', 'like', '%' . $search . '%')
                    ->orWhere('kodeKegiatan', 'like', '%' . $search . '%');
            })
            ->paginate(10);
        return view('pengguna.kegiatan.index', [
            'no' => $no,
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $id = auth()->user()->id;
        $data = Program::where('idPd', $id)->get();
        return view('pengguna.kegiatan.create', [
            'data' => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'namaKegiatan' => 'required',
        //     'targetKegiatan' => 'required',
        //     'kodeKegiatan' => 'required',
        //     'anggaran' => 'required',
        //     'idPd' => 'required',
        //     'idProgram' => 'required'
        // ]);

        Kegiatan::create([
            'namaKegiatan' => $request->namaKegiatan,
            'targetKegiatan' => $request->targetKegiatan,
            'kodeKegiatan' => $request->kodeKegiatan,
            'anggaran' => $request->anggaran,
            'idPd' => auth()->user()->id,
            'idProgram' => $request->namaProgram
        ]);
        return redirect()->route('kegiatan.index')->with('success_toast', 'Kegiatan berhasil ditambahkan!');
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
