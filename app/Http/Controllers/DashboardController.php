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
    $totalPenyakit = Penyakit::count();
    $totalGejala = Gejala::count();
    $totalAturan = Aturan::count();
    $totalDiagnosa = Diagnosis::count();

    // Ambil semua data diagnosa
    $diagnoses = Diagnosis::all();

    // Hitung jumlah kemunculan setiap penyakit
    $penyakitCounts = [];

    foreach ($diagnoses as $diagnosis) {
        $penyakitList = json_decode($diagnosis->penyakit_id, true); // Decode JSON

        if (is_array($penyakitList)) {
            foreach (array_keys($penyakitList) as $penyakitId) {
                if (!isset($penyakitCounts[$penyakitId])) {
                    $penyakitCounts[$penyakitId] = 0;
                }
                $penyakitCounts[$penyakitId]++;
            }
        }
    }

    // Ambil nama penyakit berdasarkan ID
    $labels = Penyakit::whereIn('id', array_keys($penyakitCounts))->pluck('nama')->toArray();
    $data = array_values($penyakitCounts);

    return view('admin.home', compact('labels', 'data', 'totalPenyakit', 'totalGejala', 'totalAturan', 'totalDiagnosa'));
}

}
