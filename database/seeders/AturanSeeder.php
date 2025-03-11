<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aturan;

class AturanSeeder extends Seeder
{
    public function run()
    {
        // Gaming Disorder (Penyakit ID: 1)
        Aturan::create(['gejala_id' => 1, 'penyakit_id' => 1]);
        Aturan::create(['gejala_id' => 3, 'penyakit_id' => 1]); 
        Aturan::create(['gejala_id' => 15, 'penyakit_id' => 1]);
        Aturan::create(['gejala_id' => 16, 'penyakit_id' => 1]);
        
        // Anxiety Disorder (Penyakit ID: 2)
        Aturan::create(['gejala_id' => 1, 'penyakit_id' => 2]); 
        Aturan::create(['gejala_id' => 4, 'penyakit_id' => 2]);
        Aturan::create(['gejala_id' => 10, 'penyakit_id' => 2]);
        Aturan::create(['gejala_id' => 11, 'penyakit_id' => 2]); 
        Aturan::create(['gejala_id' => 17, 'penyakit_id' => 2]); 
        
        // Demotivasi (Penyakit ID: 3)
        Aturan::create(['gejala_id' => 12, 'penyakit_id' => 3]); 
        Aturan::create(['gejala_id' => 19, 'penyakit_id' => 3]); 
        Aturan::create(['gejala_id' => 22, 'penyakit_id' => 3]); 
        Aturan::create(['gejala_id' => 24, 'penyakit_id' => 3]); 
        
        // Burnout / Kejenuhan (Penyakit ID: 4)
        Aturan::create(['gejala_id' => 2, 'penyakit_id' => 4]); 
        Aturan::create(['gejala_id' => 5, 'penyakit_id' => 4]); 
        Aturan::create(['gejala_id' => 6, 'penyakit_id' => 4]); 
        Aturan::create(['gejala_id' => 7, 'penyakit_id' => 4]); 
        Aturan::create(['gejala_id' => 11, 'penyakit_id' => 4]); 
        Aturan::create(['gejala_id' => 14, 'penyakit_id' => 4]); 

        // Depresi (Penyakit ID: 5)
        Aturan::create(['gejala_id' => 1, 'penyakit_id' => 5]); 
        Aturan::create(['gejala_id' => 5, 'penyakit_id' => 5]); 
        Aturan::create(['gejala_id' => 6, 'penyakit_id' => 5]); 
        Aturan::create(['gejala_id' => 7, 'penyakit_id' => 5]); 
        Aturan::create(['gejala_id' => 18, 'penyakit_id' => 5]); 
        Aturan::create(['gejala_id' => 20, 'penyakit_id' => 5]); 
        Aturan::create(['gejala_id' => 24, 'penyakit_id' => 5]); 

        // BPD (Borderline Personality Disorder) (Penyakit ID: 6)
        Aturan::create(['gejala_id' => 8, 'penyakit_id' => 6]); 
        Aturan::create(['gejala_id' => 9, 'penyakit_id' => 6]); 
        Aturan::create(['gejala_id' => 10, 'penyakit_id' => 6]); 

        // NPD (Narcissistic Personality Disorder) (Penyakit ID: 7)
        Aturan::create(['gejala_id' => 26, 'penyakit_id' => 7]); 
        Aturan::create(['gejala_id' => 27, 'penyakit_id' => 7]); 
        Aturan::create(['gejala_id' => 28, 'penyakit_id' => 7]); 

        // Duck Syndrome (Penyakit ID: 8)
        Aturan::create(['gejala_id' => 29, 'penyakit_id' => 8]);
        Aturan::create(['gejala_id' => 30, 'penyakit_id' => 8]); 
    }
}
