<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Penyakit;


class PenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // Menambahkan penyakit
        Penyakit::create([
            'kode' => 'P001',
            'nama' => 'Depresi',
            'deskripsi' => 'Gangguan suasana hati yang menyebabkan perasaan sedih dan kehilangan minat terhadap aktivitas.'
        ]);
        
        Penyakit::create([
            'kode' => 'P002',
            'nama' => 'Kecemasan',
            'deskripsi' => 'Perasaan khawatir yang berlebihan yang mengganggu kehidupan sehari-hari.'
        ]);

        Penyakit::create([
            'kode' => 'P003',
            'nama' => 'Gangguan Tidur',
            'deskripsi' => 'Kesulitan tidur atau tidur yang terganggu, termasuk insomnia atau tidur yang berlebihan.'
        ]);

        Penyakit::create([
            'kode' => 'P004',
            'nama' => 'Gangguan Makan',
            'deskripsi' => 'Kelainan yang melibatkan perilaku makan yang tidak sehat atau berlebihan.'
        ]);
    }
}
