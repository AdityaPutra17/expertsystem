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
            'kode' => 'P1',
            'nama' => 'Gaming Disorder',
            'deskripsi' => 'Gaming disorder adalah gangguan perilaku bermain game yang berlebihan hingga membawa pengaruh negatif pada aspek lain dalam hidup Anda. Gaming disorder masuk ke dalam Klasifikasi Penyakit Internasional (ICD-11) sebagai pola perilaku game (game digital atau video gaming) yang ditandai dengan gangguan kontrol diri atas game.'
        ]);
        
        Penyakit::create([
            'kode' => 'P2',
            'nama' => 'Anxiety Disorder',
            'deskripsi' => 'Anxiety disorder adalah gangguan mental yang ditandai dengan perasaan cemas yang berlebihan, ketakutan, dan kekhawatiran yang berlebihan. Anxiety disorder dapat memengaruhi cara Anda berpikir, merasa, dan berperilaku.'
        ]);

        Penyakit::create([
            'kode' => 'P3',
            'nama' => 'Demotivasi',
            'deskripsi' => 'Demotivasi adalah kondisi ketika seseorang tidak memiliki motivasi untuk melakukan sesuatu di kehidupannya, baik itu terhadap pekerjaan, sekolah/belajar, maupun mengembangkan diri. '
        ]);

        Penyakit::create([
            'kode' => 'P4',
            'nama' => 'Burnout / Kejenuhan',
            'deskripsi' => 'Burnout adalah kelelahan secara fisik, emosional, atau mental yang disertai dengan penurunan motivasi, kinerja, dan munculnya sikap negatif terhadap diri sendiri maupun orang lain'
        ]);

        Penyakit::create([
            'kode' => 'P5',
            'nama' => 'Depresi',
            'deskripsi' => 'Depresi adalah gangguan mental yang ditandai dengan perasaan sedih, kehilangan minat atau kesenangan, rasa bersalah, dan kehilangan energi. Depresi dapat memengaruhi cara Anda tidur, makan, dan berpikir.'
        ]);

        Penyakit::create([
            'kode' => 'P6',
            'nama' => 'BPD (Borderline Personality Disorder)',
            'deskripsi' => 'Borderline personality disorder (BPD) adalah gangguan mental yang ditandai dengan pola pikiran dan perilaku yang tidak stabil, termasuk gambaran diri yang buruk, hubungan antarpribadi yang tidak stabil, dan perilaku impulsif.'
        ]);
        Penyakit::create([
            'kode' => 'P7',
            'nama' => 'NPD (Narcissistic Personality Disorder)',
            'deskripsi' => 'Narcissistic personality disorder (NPD) adalah gangguan kepribadian yang ditandai dengan rasa percaya diri yang berlebihan, kebutuhan akan pujian, dan kurangnya empati terhadap orang lain.'
        ]);
        Penyakit::create([
            'kode' => 'P8',
            'nama' => 'Duck Syndrome',
            'deskripsi' => 'Duck syndrome adalah kondisi di mana seseorang tampak tenang dan santai di permukaan, tetapi sebenarnya sedang stres atau cemas di dalam hati.'
        ]);
    }
}
