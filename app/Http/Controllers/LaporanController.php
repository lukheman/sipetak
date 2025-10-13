<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Petugas;
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

    public function laporanPetugas()
    {

        $users = Petugas::all();

        $pdf = Pdf::loadView('invoices.laporan-petugas', ['users' => $users, 'label' => 'Petugas Lapangan', 'pdf' => true]);

        return $pdf->download('laporan_data_petugas_lapangan'.date('d_m_Y').'.pdf');

    }

}
