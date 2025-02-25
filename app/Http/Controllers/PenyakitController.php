<?php

namespace App\Http\Controllers;

use App\Models\Penyakit;
use Illuminate\Http\Request;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $penyakits = Penyakit::all();
        return view('admin.penyakit.index', compact('penyakits'));
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
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        Penyakit::create($request->all());

        return redirect()->route('penyakit.index')
            ->with('success', 'Penyakit created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penyakit $penyakit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penyakit $penyakit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        $penyakit = Penyakit::find($id);

        if (!$penyakit) {
            return redirect()->route('penyakit.index')
                ->with('error', 'Penyakit not found.');
        }

        $penyakit->update($request->all());

        return redirect()->route('penyakit.index')
            ->with('success', 'Penyakit updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $penyakit = Penyakit::find($id);
        $penyakit->delete();

        return redirect()->route('penyakit.index')
            ->with('success', 'Penyakit deleted successfully.');
    }
}
