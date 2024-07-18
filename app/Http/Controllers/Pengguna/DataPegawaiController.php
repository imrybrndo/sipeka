<?php

namespace App\Http\Controllers\pengguna;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataPegawaiController extends Controller
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
        $data = Pegawai::where('idPd', $id)
            ->where(function ($query) use ($search) {
                $query->where('namaPegawai', 'like', '%' . $search . '%')
                    ->orWhere('nip', 'like', '%' . $search . '%');
            })
            ->paginate(10);
        return view('pengguna.pegawai.index', [
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
        return view('pengguna.pegawai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nip' => 'required',
            'namaPegawai' => 'required',
            'pangkatGolongan' => 'required',
            'status' => 'required',
            'jabatan' => 'required'
        ]);

        Pegawai::create([
            'nip' => $request->nip,
            'namaPegawai' => $request->namaPegawai,
            'pangkatGolongan' => $request->pangkatGolongan,
            'jabatan' => $request->jabatan,
            'status' => $request->status,
            'idPd' => auth()->user()->id
        ]);

        return redirect()->route('pegawai.index')->with('toast_success', 'Pegawai berhasil ditambah!!');
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
            'nip' => 'required',
            'namaPegawai' => 'required',
            'pangkatGolongan' => 'required',
            'status' => 'required',
            'jabatan' => 'required',
            'status' => 'required'
        ]);
        $data = Pegawai::findOrFail($id);
        $data->update([
            'nip' => $request->nip,
            'namaPegawai' => $request->namaPegawai,
            'pangkatGolongan' => $request->pangkatGolongan,
            'jabatan' => $request->jabatan,
            'status' => $request->status,
            'idPd' => auth()->user()->id
        ]);
        return redirect()->route('pegawai.index')->with('toast_success', 'Data pegawai berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Pegawai::findOrFail($id);
        $data->delete();
        return redirect()->route('pegawai.index')->with('toast_success', 'Pegawai berhasil dihapus!');
    }
}
