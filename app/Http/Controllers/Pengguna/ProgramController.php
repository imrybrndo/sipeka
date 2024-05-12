<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Program;
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
        $data = Program::where('idPd', $id)
        ->where(function ($query) use ($search) {
            $query->where('namaProgram', 'like', '%' . $search . '%')
                ->orWhere('anggaran', 'like', '%' . $search . '%');
        })->paginate(10);
        return view('pengguna.program.index', [
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
            'targetAnggaran' => 'required',
            'anggaran' => 'required'
        ]);
        
        Program::create([
            'namaProgram' => $request->namaProgram,
            'targetAnggaran' => $request->targetAnggaran,
            'anggaran' => $request->anggaran,
            'idPd' => auth()->user()->id
        ]);
        return redirect()->route('program.index')->with('toast_success', 'Program berhasil ditambahkan!');
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
        $this->validate($request,[
            'namaProgram' => 'required',
            'targetAnggaran' => 'required',
            'anggaran' => 'required'
        ]);

        $data = Program::findOrFail($id);
        $data->update([
            'namaProgram' => $request->namaProgram,
            'targetAngggaran' => $request->targetAnggaran,
            'anggaran' => $request->anggaran,
            'idPd' => auth()->user()->id
        ]);
        return redirect()->route('program.index')->with('toast_success', 'Program berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Program::findOrFail($id);
        $data->delete();
        return redirect()->route('program.index')->with('toast_success', 'Program berhasil dihapus!');
    }
}
