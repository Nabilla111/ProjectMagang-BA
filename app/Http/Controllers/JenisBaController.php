<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenisba;


class JenisBaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisbas=jenisba::orderBy('created_at', 'DESC')->get();
        return view('jenisba.index', compact('jenisbas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenisba.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'jenisba'=> 'required',
           ]);  
            
        jenisba::create($validatedData);
        return redirect()->route('jenisba')->with('success','Tambah Perihal BA Sukses');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jenisbas=jenisba::findOrfail($id);
        return view ('jenisba.show', compact('jenisbas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenisbas=jenisba::findOrfail($id);
        return view ('jenisba.edit', compact('jenisbas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    // Mengambil data jenis berita acara berdasarkan ID
    $jenisbas = JenisBa::findOrFail($id);

    // Update data jenis berita acara dengan data yang dikirimkan melalui request
    $jenisbas->update($request->all());

    // Redirect ke halaman daftar jenis berita acara dengan pesan sukses
    return redirect()->route('jenisba')->with('success', 'Perihal BA berhasil diedit!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenisbas=jenisba::findOrfail($id);
        $jenisbas->delete();
        return redirect()->route('jenisba')->with('success','Perihal BA berhasil dihapus!');
    }
}
