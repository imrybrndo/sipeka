<?php

namespace App\Http\Controllers\Pengguna\CascadingDetail;

use App\Http\Controllers\Controller;
use App\Models\CasCadingTujuan;
use App\Models\SasaranKegiatan;
use App\Models\SasaranLima;
use App\Models\SasaranProgram;
use App\Models\SasaranStrategis;
use App\Models\Tujuan;
use App\Models\User;
use Illuminate\Http\Request;

class CascadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $no = 1;
        $id = auth()->user()->id;

        $tujuan = CasCadingTujuan::where('idPd', $id)->get();
        $data_tujuan = CasCadingTujuan::with('sasaranStrategis')->where('idPd', $id)->get();
        $sasaran = SasaranStrategis::where('idPd', $id)->get();

        // $program = SasaranProgram::where('idPd', $id)->get();
        $data_program = SasaranProgram::with('sasaranStrategis')->where('idPd', $id)->get();

        // $kegiatan = SasaranKegiatan::where('idPd', $id)->get();
        $data_kegiatan = SasaranKegiatan::with('sasaranProgram')->where('idPd', $id)->get();


        // $lima = SasaranLima::where('idPd', $id)->get();
        $data_lima = SasaranLima::with('sasaranKegiatan')->where('idPd', $id)->get();


        $skpd = User::where('tipePengguna', 'pengguna')->get();
        return view('pengguna.detail.index', [
            'no1' => 1,
            'no2' => 1,
            'no3' => 1,
            'no4' => 1,
            'no5' => 1,
            'id' => $id,

            'data_tujuan' => $data_tujuan,
            'data_program' => $data_program,
            'data_kegiatan' => $data_kegiatan,
            'data_lima' => $data_lima,

            'tujuan' => $tujuan,
            'sasaran' => $sasaran,
            // 'program' => $program,
            // 'kegiatan' => $kegiatan,
            // 'lima' => $lima,
            'skpd' => $skpd
        ]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $key)
    {
        if ($request->input('kategori') == 'tujuan') {
            $data = CasCadingTujuan::where('key', $key);
            $data->update([
                'name' => $request->tujuan,
                'indikator' => $request->indikator,
                'croscut' => $request->input('croscut')
            ]);
        } elseif ($request->input('kategori') == 'sasaran') {
            $data = SasaranStrategis::where('key', $key);
            $data->update([
                'name' => $request->sasaran,
                'indikator' => $request->indikator,
                'croscut' => $request->croscut
            ]);
        } elseif ($request->input('kategori') == 'program') {
            $data = SasaranProgram::where('key', $key);
            $data->update([
                'name' => $request->program,
                'indikator' => $request->indikator,
                'croscut' => $request->croscut
            ]);
        } elseif ($request->input('kategori') == 'kegiatan') {
            $data = SasaranKegiatan::where('key', $key);
            $data->update([
                'name' => $request->kegiatan,
                'indikator' => $request->indikator,
                'croscut' => $request->croscut
            ]);
        } elseif ($request->input('kategori') == 'lima') {
            $data = SasaranLima::where('key', $key);
            $data->update([
                'name' => $request->itemLima,
                'indikator' => $request->indikator,
                'croscut' => $request->croscut
            ]);
        }
        return redirect()->route('cascading_detail.index')->with('toast_success', 'Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $key)
    {

        $id = auth()->user()->id;
        if ($request->input('level') == 1) {
            //Autentikasi Level 1
            $data = SasaranStrategis::where('parent', $key)
                ->where('idPd', $id)
                ->first();
            if ($data) {
                return redirect()->route('cascading_detail.index')->with('warning', 'Tidak dapat menghapus data ini karena memiliki anak pohon!');
            } else {
                Tujuan::where('key', $key)
                    ->where('idPd', $id)
                    ->delete();
            }
        } elseif ($request->input('level') == 2) {
            //Authentikasi Level 2
            $program = SasaranProgram::where('parent', $key)
                ->where('idPd', $id)
                ->first();
            if ($program) {
                return redirect()->route('cascading_detail.index')->with('warning', 'Tidak dapat menghapus data ini karena memiliki anak pohon!');
            } else {
                SasaranStrategis::where('key', $key)
                    ->where('idPd', $id)
                    ->delete();
            }
        } elseif ($request->input('level') == 3) {
            //Autentikasi Level 3
            $kegiatan = SasaranKegiatan::where('parent', $key)
                ->where('idPd', $id)
                ->first();
            if ($kegiatan) {
                return redirect()->route('cascading_detail.index')->with('warning', 'Tidak dapat menghapus data ini karena memiliki anak pohon!');
            } else {
                SasaranProgram::where('key', $key)
                    ->where('idPd', $id)
                    ->delete();
            }
        } elseif ($request->input('level') == 4) {
            $lima = SasaranLima::where('parent', $key)
                ->where('idPd', $id)
                ->first();
            if ($lima) {
                return redirect()->route('cascading_detail.index')->with('warning', 'Tidak dapat menghapus data ini karena memiliki anak pohon!');
            } else {
                SasaranKegiatan::where('key', $key)
                    ->where('idPd', $id)
                    ->delete();
            }
        } elseif ($request->input('level') == 5) {
            SasaranLima::where('key', $key)
                ->where('idPd', $id)
                ->delete();
        }
        return redirect()->route('cascading_detail.index')->with('success', 'Berhasil!!');
    }
}
