<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Aturan;

class AturanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Aturan untuk penyakit Depresi (P001)
        Aturan::create(['gejala_id' => 1, 'penyakit_id' => 1]); // G001 - Merasa cemas
        Aturan::create(['gejala_id' => 4, 'penyakit_id' => 1]); // G004 - Perasaan sedih yang berlarut-larut
        Aturan::create(['gejala_id' => 7, 'penyakit_id' => 1]); // G007 - Mudah lelah
        Aturan::create(['gejala_id' => 9, 'penyakit_id' => 1]); 

        // Aturan untuk penyakit Kecemasan (P002)
        Aturan::create(['gejala_id' => 1, 'penyakit_id' => 2]); // G001 - Merasa cemas
        Aturan::create(['gejala_id' => 8, 'penyakit_id' => 2]); // G008 - Kekhawatiran berlebihan
        Aturan::create(['gejala_id' => 9, 'penyakit_id' => 2]); // G008 - Kekhawatiran berlebihan

        // Aturan untuk penyakit Gangguan Tidur (P003)
        Aturan::create(['gejala_id' => 3, 'penyakit_id' => 3]); // G003 - Sulit tidur
        Aturan::create(['gejala_id' => 4, 'penyakit_id' => 3]); // G004 - Perasaan sedih yang berlarut-larut
        Aturan::create(['gejala_id' => 9, 'penyakit_id' => 3]); // G004 - Perasaan sedih yang berlarut-larut

        // Aturan untuk penyakit Gangguan Makan (P004)
        Aturan::create(['gejala_id' => 5, 'penyakit_id' => 4]); // G005 - Gangguan makan
        Aturan::create(['gejala_id' => 9, 'penyakit_id' => 4]); // G005 - Gangguan makan
    }
}
