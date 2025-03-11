<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aturan;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Diagnosis;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $statistikPenyakit = Diagnosis::select('penyakit_id', \DB::raw('count(*) as total'))
        ->groupBy('penyakit_id')
        ->get();

        // Ambil nama penyakit
        $penyakitList = Penyakit::pluck('nama', 'id');

        // Format data untuk Chart.js
        $labels = [];
        $data = [];

        foreach ($statistikPenyakit as $stat) {
            $labels[] = $penyakitList[$stat->penyakit_id] ?? 'Tidak Diketahui';
            $data[] = $stat->total;
        }

        $totalPenyakit = Penyakit::count();
        $totalGejala = Gejala::count();
        $totalAturan = Aturan::count();
        $totalDiagnosa = Diagnosis::count();
        return view('admin.home', compact('totalPenyakit', 'totalGejala', 'totalAturan', 'totalDiagnosa', 'labels', 'data'));
    }
}
