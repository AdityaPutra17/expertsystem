<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gejala;

class GejalaSeeder extends Seeder
{
    public function run()
    {
        Gejala::create(['kode' => 'G001', 'nama' => 'Kecemasan berlebihan dalam melakukan sesuatu']); 
        Gejala::create(['kode' => 'G002', 'nama' => 'Kesulitan mengelola stres']); 
        Gejala::create(['kode' => 'G003', 'nama' => 'Menghabiskan waktu lebih banyak untuk bermain game daripada berinteraksi dengan orang lain']);
        Gejala::create(['kode' => 'G004', 'nama' => 'Serangan panik secara tiba-tiba']); 
        Gejala::create(['kode' => 'G005', 'nama' => 'Perasaan sedih yang berlarut-larut']); 
        Gejala::create(['kode' => 'G006', 'nama' => 'Menarik diri dari kegiatan sosial atau profesional']); 
        Gejala::create(['kode' => 'G007', 'nama' => 'Kesulitan tidur atau tidur berlebihan']); 
        Gejala::create(['kode' => 'G008', 'nama' => 'Hubungan interpersonal yang sangat fluktuatif dan tidak stabil']); 
        Gejala::create(['kode' => 'G009', 'nama' => 'Perilaku impulsif dan tidak stabil']); 
        Gejala::create(['kode' => 'G010', 'nama' => 'Ketakutan berlebihan terhadap penolakan atau ditinggalkan']); 
        Gejala::create(['kode' => 'G011', 'nama' => 'Ketegangan otot atau rasa tidak nyaman pada tubuh']); 

        Gejala::create(['kode' => 'G012', 'nama' => 'Kehilangan minat atau motivasi']);
        Gejala::create(['kode' => 'G013', 'nama' => 'Perubahan suasana hati yang ekstrem']);
        Gejala::create(['kode' => 'G014', 'nama' => 'Kelelahan fisik atau mental']);
        Gejala::create(['kode' => 'G015', 'nama' => 'Kesulitan mengontrol waktu bermain game']);
        Gejala::create(['kode' => 'G016', 'nama' => 'Mengabaikan tanggung jawab sosial atau pekerjaan']);
        Gejala::create(['kode' => 'G017', 'nama' => 'Khawatir tentang kejadian yang belum terjadi']);
        Gejala::create(['kode' => 'G018', 'nama' => 'Merasa terjebak atau tidak memiliki tujuan hidup']);
        Gejala::create(['kode' => 'G019', 'nama' => 'Rasa malas yang berlebihan']);
        Gejala::create(['kode' => 'G020', 'nama' => 'Perasaan lelah atau kosong meskipun tidak ada alasan fisik yang jelas']);
        Gejala::create(['kode' => 'G021', 'nama' => 'Kesulitan untuk memulai atau menyelesaikan tugas']);
        Gejala::create(['kode' => 'G022', 'nama' => 'Penurunan motivasi dan kinerja']);
        Gejala::create(['kode' => 'G023', 'nama' => 'Perasaan frustrasi atau kesal terhadap pekerjaan']);
        Gejala::create(['kode' => 'G024', 'nama' => 'Kehilangan minat dalam kegiatan sehari-hari']);
        Gejala::create(['kode' => 'G025', 'nama' => 'Perasaan tidak berharga atau bersalah']);
        Gejala::create(['kode' => 'G026', 'nama' => 'Perasaan superioritas dan keinginan untuk dihormati']);
        Gejala::create(['kode' => 'G027', 'nama' => 'Kurangnya empati terhadap orang lain']);
        Gejala::create(['kode' => 'G028', 'nama' => 'Kecenderungan untuk memanipulasi orang lain untuk keuntungan pribadi']);
        Gejala::create(['kode' => 'G029', 'nama' => 'Tampilan tenang atau santai di permukaan, tetapi merasa tertekan di dalam']);
        Gejala::create(['kode' => 'G030', 'nama' => 'Rasa tidak nyaman yang terus-menerus meskipun tampak tenang']);
    }
}
