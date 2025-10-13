<?php

namespace App\Http\Controllers;

use App\Models\LaporanSerangan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function laporanPetani()
    {

        $users = User::all();
        $pdf = Pdf::loadView('invoices.laporan-petani', ['users' => $users, 'label' => 'Petani', 'pdf' => true]);

        return $pdf->download('laporan_data_petani_'.date('d_m_Y').'.pdf');

    }

    public function laporanSeranganSatu($id_laporan) {
        $laporan = LaporanSerangan::query()->with('tanaman', 'user', 'penanganan', 'penyebabSerangan')->find($id_laporan);

        return view('invoices.laporan-serangan-satu', ['laporan' => $laporan]);
    }

}
