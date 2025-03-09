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

        // Ambil daftar penyakit yang masih mungkin dalam bentuk array
        $possibleDiseases = session('possibleDiseases', []);
        if ($possibleDiseases instanceof \Illuminate\Support\Collection) {
            $possibleDiseases = $possibleDiseases->toArray();
        }

        if (!$request->answer) {
            // Jika jawaban "tidak", hapus penyakit yang memiliki gejala ini dari daftar kemungkinan
            $excludedDiseases = Aturan::where('gejala_id', $request->idgejala)->pluck('penyakit_id')->toArray();
            $possibleDiseases = array_diff($possibleDiseases, $excludedDiseases);

            session(['possibleDiseases' => array_values($possibleDiseases)]);
        }

        // Cek apakah ada penyakit yang sudah cocok sepenuhnya
        foreach ($possibleDiseases as $penyakitId) {
            $gejalaPenyakit = Aturan::where('penyakit_id', $penyakitId)->pluck('gejala_id')->toArray();
            if (count(array_intersect($gejalaPenyakit, array_keys($answers))) == count($gejalaPenyakit)) {
                session(['detectedPenyakit' => Penyakit::find($penyakitId)]);
                return redirect()->route('diagnosis.result');
            }
        }

        // Cari gejala berikutnya yang belum ditanyakan dari penyakit yang masih mungkin
        $nextGejala = Aturan::whereIn('penyakit_id', $possibleDiseases)
                            ->whereNotIn('gejala_id', array_keys($answers))
                            ->pluck('gejala_id')
                            ->first();

        // Jika tidak ada gejala lagi, langsung ke hasil
        if (!$nextGejala) {
            return redirect()->route('diagnosis.result');
        }

        return redirect()->route('diagnosis.question', ['id' => $nextGejala]);
    }


    public function result()
    {
        $detectedPenyakit = session('detectedPenyakit');
        return view('diagnosis.result', compact('detectedPenyakit'));
    }

    public function saveDiagnosis(Request $request)
    {
        $userNama = session('user_nama');
        $answers = session('answers', []);
        $penyakitId = session('detectedPenyakit')?->id;

        Diagnosis::create([
            'user_nama' => $userNama,
            'answer_log' => json_encode($answers),
            'penyakit_id' => $penyakitId,
        ]);

        session()->forget(['user_nama', 'answers', 'detectedPenyakit', 'possibleDiseases']);
        return redirect()->route('diagnosis.form');
    }

    public function admin()
    {
        $diagnoses = Diagnosis::with('penyakit')->latest()->paginate(10);
        return view('admin.diagnosa.index', compact('diagnoses'));
    }
}
