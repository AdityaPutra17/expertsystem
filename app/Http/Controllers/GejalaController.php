<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gejala;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $gejalas = Gejala::all();
        return view('admin.gejala.index', compact('gejalas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'kode' => 'required',
            'nama' => 'required'
        ]);

        Gejala::create($request->all());

        return redirect()->route('gejala.index')
            ->with('success', 'Gejala created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // Validasi input
        $request->validate([
            'kode' => 'required|string|max:10',
            'nama' => 'required|string|max:255',
        ]);

        // Mencari gejala berdasarkan ID
        $gejala = Gejala::find($id);

        // Jika gejala tidak ditemukan
        if (!$gejala) {
            return redirect()->route('gejala.index')->with('error', 'Gejala tidak ditemukan.');
        }

        // Update data gejala
        $gejala->kode = $request->input('kode');
        $gejala->nama = $request->input('nama');
        $gejala->save(); // Simpan perubahan ke database

        // Redirect ke halaman gejala dengan pesan sukses
        return redirect()->route('gejala.index')->with('success', 'Gejala berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $gejalas = Gejala::find($id);
        $gejalas->delete();

        return redirect()->route('gejala.index')
            ->with('success', 'Gejala deleted successfully');

    }
}
