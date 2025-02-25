<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    //
    protected $table = 'penyakits';
    protected $fillable = ['kode', 'nama', 'deskripsi'];
}
