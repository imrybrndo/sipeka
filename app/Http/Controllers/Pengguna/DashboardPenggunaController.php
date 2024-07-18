<?php

namespace App\Http\Controllers\Pengguna;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardPenggunaController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id;
        $row = Pegawai::count();
        $grade = User::where('id', $id)->first();
        $result_grade = $grade->gradePd;
        $maxgrade = 100;
        $persentase = ($result_grade / $maxgrade) * 100;
        $first_digit = intval($persentase);

        $capaian = User::where('id', $id)->first();
        $hasilCapaian = $capaian->capaianPd;
        $result = ($hasilCapaian / $maxgrade) * 100;
        $two_digit = intval($result);
        return view('pengguna.index', ['row' => $row, 'grade' => $first_digit, 'capaianPd' => $two_digit]);
    }
}
