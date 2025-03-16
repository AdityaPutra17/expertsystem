<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Aturan;
use Illuminate\Http\Request;

class DiagnosisController extends Controller
{
    public function showForm()
    {
        return view('diagnosis.form');
    }

    public function startDiagnosis(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        session(['user_nama' => $request->nama, 'answers' => [], 'possibleDiseases' => Aturan::pluck('penyakit_id')->unique()]);

        // Ambil gejala pertama yang ada dalam aturan
        $firstGejala = Aturan::pluck('gejala_id')->unique()->first();
        return redirect()->route('diagnosis.question', ['id' => $firstGejala]);
    }

    public function question($id)
    {
        $answers = session('answers', []);
        $gejala = Gejala::find($id);

        if (!$gejala) {
            return redirect()->route('diagnosis.result');
        }

        return view('diagnosis.question', compact('gejala'));
    }

    public function processAnswer(Request $request)
    {
        $request->validate([
            'idgejala' => 'required|numeric',
            'answer' => 'required|boolean',
        ]);
    
        $answers = session('answers', []);
        $answers[$request->idgejala] = $request->answer;
        session(['answers' => $answers]);
    
        // Ambil daftar penyakit yang masih mungkin
        $possibleDiseases = session('possibleDiseases', []);
        if ($possibleDiseases instanceof \Illuminate\Support\Collection) {
            $possibleDiseases = $possibleDiseases->toArray();
        }
    
        // Hitung persentase untuk setiap penyakit
        $diseaseScores = [];
        foreach ($possibleDiseases as $penyakitId) {
            $gejalaPenyakit = Aturan::where('penyakit_id', $penyakitId)->pluck('gejala_id')->toArray();
            $totalGejala = count($gejalaPenyakit);
            $matchedGejala = count(array_intersect($gejalaPenyakit, array_keys(array_filter($answers))));
    
            if ($totalGejala > 0) {
                $percentage = ($matchedGejala / $totalGejala) * 100;
                $diseaseScores[$penyakitId] = round($percentage, 2);
            }
        }
    
        session(['diseaseScores' => $diseaseScores]);
    
        // Cari gejala berikutnya yang belum ditanyakan
        $nextGejala = Aturan::whereIn('penyakit_id', $possibleDiseases)
                            ->whereNotIn('gejala_id', array_keys($answers))
                            ->pluck('gejala_id')
                            ->first();
    
        if (!$nextGejala) {
            return redirect()->route('diagnosis.result');
        }
    
        return redirect()->route('diagnosis.question', ['id' => $nextGejala]);
    }
    

    public function result()
    {
        $diseaseScores = session('diseaseScores', []);
        arsort($diseaseScores); // Urutkan dari yang 

        $topDiseases = array_slice($diseaseScores, 0, 3, true);

        $detectedDiseases = [];
        foreach ($topDiseases as $penyakitId => $percentage) {
            $detectedDiseases[] = [
                'penyakit' => Penyakit::find($penyakitId),
                'percentage' => $percentage
            ];
        }

        return view('diagnosis.result', compact('detectedDiseases'));
    }

    public function saveDiagnosis(Request $request)
    {
        $userNama = session('user_nama');
        $answers = session('answers', []);
    
        // Ambil 3 penyakit dengan persentase tertinggi
        $diseaseScores = session('diseaseScores', []);
        arsort($diseaseScores); // Urutkan dari yang tertinggi
        $topDiseases = array_slice($diseaseScores, 0, 3, true);
    
        // Simpan ke database
        Diagnosis::create([
            'user_nama' => $userNama,
            'answer_log' => json_encode($answers),
            'penyakit_id' => json_encode($topDiseases), // Simpan sebagai JSON
        ]);
    
        // Reset session
        session()->forget(['user_nama', 'answers', 'diseaseScores', 'possibleDiseases']);
    
        return redirect()->route('diagnosis.form');
    }

    public function admin()
    {
        $diagnoses = Diagnosis::with('penyakit')->latest()->paginate(10);
        return view('admin.diagnosa.index', compact('diagnoses'));
    }
}
