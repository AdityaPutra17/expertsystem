<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aturan extends Model
{
    /** @use HasFactory<\Database\Factories\AturanFactory> */
    use HasFactory;

    protected $tabel = 'aturans';
    protected $fillable = ['gejala_id', 'penyakit_id'];

    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'gejala_id');
    }
    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'penyakit_id');
    }

}
