<?php

namespace App\Http\Controllers\Pengguna\Cascading;

use App\Http\Controllers\Controller;
use App\Models\SasaranLima;
use Illuminate\Http\Request;

class SasaranLimaController extends Controller
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
        $this->validate($request, [
            'sasaranLima.*' => 'required'
        ]);
        $existData = SasaranLima::exists();
        if ($existData) {
            $max_key = SasaranLima::max('key');
            foreach ($request->input('sasaranLima') as $sasaranLima) {
                $max_key++;
                SasaranLima::create([
                    'key' => $max_key,
                    'name' => $sasaranLima,
                    'parent' => $request->input('sasaranKegiatan'),
                    'indikator' => $request->indikator,
                    'croscut' => $request->crosscut,
                    'idPd' => auth()->user()->id
                ]);
            }
        } elseif (!$existData) {
            $lastkey = SasaranLima::max('key');
            foreach ($request->input('sasaranLima') as $sasaranLima) {
                $lastkey++;
                SasaranLima::create([
                    'key' => $lastkey,
                    'name' => $sasaranLima,
                    'parent' => $request->input('sasaranKegiatan'),
                    'indikator' => $request->indikator,
                    'croscut' => $request->crosscut,
                    'idPd' => auth()->user()->id
                ]);
            }
        }
        return redirect()->route('cascading.index')->with('success', 'Berhasil!!');
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
