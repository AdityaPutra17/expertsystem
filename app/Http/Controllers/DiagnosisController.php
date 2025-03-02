<?php

namespace App\Http\Controllers;

use App\Models\Diagnosis;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\Aturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Route;

class DiagnosisController extends Controller
{
    private $allGejala;

    public function __construct()
    {
        $this->allGejala = Gejala::count();
    }

    public function showForm()
    {
        return view('diagnosis.form');
    }

    public function startDiagnosis(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
        ]);

        session(['user_nama' => $request->nama]);
        return redirect()->route('diagnosis.question', ['id' => 1]);
    }

    public function question($id)
    {
        $gejala = Gejala::find($id);
        if (!$gejala) {
            return redirect()->route('diagnosis.result');
        }
        return view('diagnosis.question', compact('gejala'));
    }

    public function processAnswer(Request $request)
    {
        $request->validate([
            'idgejala' => 'required|numeric|min:1|max:' . $this->allGejala,
            'answer' => 'required|boolean',
        ]);

        $answers = session('answers', []);
        $answers[$request->idgejala] = $request->answer;
        session(['answers' => $answers]);

        return redirect()->route('diagnosis.question', ['id' => $request->idgejala + 1]);
    }

    public function result()
    {
        $answers = session('answers', []);
        $rules = Aturan::all()->groupBy('penyakit_id');
        $detectedPenyakit = null;

        foreach ($rules as $penyakitId => $gejalas) {
            $isMatch = true;
            foreach ($gejalas as $gejala) {
                if (!($answers[$gejala->gejala_id] ?? false)) {
                    $isMatch = false;
                    break;
                }
            }
            if ($isMatch) {
                $detectedPenyakit = Penyakit::find($penyakitId);
                break;
            }
        }

        session(['detectedPenyakit' => $detectedPenyakit]); // Simpan ke session

        return view('diagnosis.result', compact('detectedPenyakit'));
    }


    public function saveDiagnosis(Request $request)
    {
        $userNama = session('user_nama');
        $answers = session('answers', []);
        $penyakitId = $request->penyakit_id ?? session('detectedPenyakit')?->id;

        Diagnosis::create([
            'user_nama' => $userNama,
            'answer_log' => json_encode($answers),
            'penyakit_id' => $penyakitId,
        ]);

        session()->forget(['user_nama', 'answers', 'detectedPenyakit']);
        return redirect()->route('diagnosis.form');
    }

    public function admin()
    {
        $diagnoses = Diagnosis::with('penyakit')->latest()->paginate(10);
        return view('admin.diagnosa.index', compact('diagnoses'));
    }
    


}