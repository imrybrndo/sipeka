<?php

namespace App\Http\Controllers\Walikota;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardWalikotaController extends Controller
{
    public function index()
    {

        $data = User::where('tipePengguna', 'pengguna')->paginate(15);
        $data->transform(function ($item) {
            $item->capaianPd = round($item->capaianPd * 100 / 1000);
            $item->gradePd = round($item->gradePd * 100, 1);
            return $item;
        });
        $no = 1;
        return view('walikota.index', ['data' => $data, 'no' => $no]);
    }
}
