<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Gejala;

class GejalaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Gejala::create(['kode' => 'G001', 'nama' => 'Ada Bisikan']);
        Gejala::create(['kode' => 'G002', 'nama' => 'Merasa tertekan']);
        Gejala::create(['kode' => 'G003', 'nama' => 'Sulit tidur']);
        Gejala::create(['kode' => 'G004', 'nama' => 'Perasaan sedih yang berlarut-larut']);
        Gejala::create(['kode' => 'G005', 'nama' => 'Gangguan makan']);
        Gejala::create(['kode' => 'G006', 'nama' => 'Kehilangan minat']);
        Gejala::create(['kode' => 'G007', 'nama' => 'Mudah lelah']);
        Gejala::create(['kode' => 'G008', 'nama' => 'Kekhawatiran berlebihan']);
        Gejala::create(['kode' => 'G009', 'nama' => 'Merasa cemas']);
    }
}
