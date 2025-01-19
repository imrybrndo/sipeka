<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\SuratPerjanjian;
use App\Models\UploadPerjanjianKinerja as ModelsUploadPerjanjianKinerja;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadPerjanjianKinerja extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'upload_file' => 'required|mimes:pdf'
        ]);

        $fileName = $request->file('upload_file');
        $fileName->storeAs('public/pdf', $fileName->hashName());

        ModelsUploadPerjanjianKinerja::create([
            'nama_file' => $fileName->hashName(),
            'idPd' => auth()->user()->id,
            'idSurat' => $request->idSurat
        ]);

        $dataSurat = SuratPerjanjian::where('id', $request->idSurat);
        $dataSurat->update([
            'status' => 1
        ]);

        $id = auth()->user()->id;
        $dataUser = User::where('id', $id);
        $dataUser->update([
            'perjanjian_kinerja' => 1
        ]);


        return redirect()->route('surat.index')->with('success', 'File berhasil diunggah!');
    }

    public function delete(Request $request, $id)
    {

        $idUser = auth()->user()->id;
        $dataUser = User::where('id', $idUser);
        $data = ModelsUploadPerjanjianKinerja::where('idSurat', $id)->first();
        $dataSurat = SuratPerjanjian::where('id', $id);
        $dataSurat->update([
            'status' => 0
        ]);
        $dataUser->update([
            'perjanjian_kinerja' => 0
        ]);
        Storage::delete('public/pdf/' . $data->nama_file);
        $data->delete();
        return redirect()->route('surat.index')->with('success', 'Berhasil menghapus dokumen!');
    }
}
