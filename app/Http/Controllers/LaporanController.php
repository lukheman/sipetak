<?php

namespace App\Http\Controllers;

use App\Models\LaporanSerangan;
use App\Models\Petani;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanController extends Controller
{
    public function laporanPetani()
    {
        $users = Petani::all();
        $pdf = Pdf::loadView('invoices.laporan-petani', ['users' => $users, 'label' => 'Petani', 'pdf' => true]);

        return $pdf->download('laporan_data_petani_' . date('d_m_Y') . '.pdf');
    }

    public function laporanSeranganSatu($id_laporan)
    {
        $laporan = LaporanSerangan::query()->with('tanaman', 'petani', 'penanganan')->find($id_laporan);

        $pdf = Pdf::loadView('invoices.laporan-serangan-satu', ['laporan' => $laporan]);

        return $pdf->download('laporan_serangan_tanamanan_' . date('d_m_Y') . '.pdf');
    }
}
