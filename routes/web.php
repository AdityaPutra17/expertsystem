<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\AturanController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('client.home');
})->name('home');

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'auth']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/admin', function () {
    return view('admin.home');
})->middleware('auth');



// Route::get('/gejala', [GejalaController::class, 'index'])->name('gejala.index');
// Route::get('/gejala/create', [GejalaController::class, 'create'])->name('gejala.create');
// Route::post('/gejala', [GejalaController::class, 'store'])->name('gejala.store');
// Route::put('/gejala/{id}', [GejalaController::class, 'update'])->name('gejala.update');
// Route::delete('/gejala/{id}', [GejalaController::class, 'destroy'])->name('gejala.destroy');

// Route::get('/penyakit', [PenyakitController::class, 'index'])->name('penyakit.index');
// Route::get('/penyakit/create', [PenyakitController::class, 'create'])->name('penyakit.create');
// Route::post('/penyakit', [PenyakitController::class, 'store'])->name('penyakit.store');
// Route::put('/penyakit/{id}', [PenyakitController::class, 'update'])->name('penyakit.update');
// Route::delete('/penyakit/{id}', [PenyakitController::class, 'destroy'])->name('penyakit.destroy');

Route::resource('/admin/penyakit', PenyakitController::class)->middleware('auth');
Route::resource('/admin/gejala', GejalaController::class)->middleware('auth');
Route::resource('/admin/aturan', AturanController::class)->middleware('auth');

