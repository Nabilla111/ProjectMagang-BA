<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jenisdata;

class JenisdataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenisdatas=jenisdata::orderBy('created_at', 'DESC')->get();
        return view('jenisdata.index', compact('jenisdatas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenisdata.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'jenisdata'=> 'required',
           ]);  
            
        jenisdata::create($validatedData);
        return redirect()->route('jenisdata')->with('success','Tambah Jenis Data Sukses');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jenisdatas=jenisdata::findOrfail($id);
        return view ('jenisdata.show', compact('jenisdatas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $jenisdatas=jenisdata::findOrfail($id);
        return view ('jenisdata.edit', compact('jenisdatas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Mengambil data jenis berita acara berdasarkan ID
    $jenisdatas = JenisData::findOrFail($id);

    // Update data jenis berita acara dengan data yang dikirimkan melalui request
    $jenisdatas->update($request->all());

    // Redirect ke halaman daftar jenis berita acara dengan pesan sukses
    return redirect()->route('jenisdata')->with('success', 'Jenis Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jenisdatas=jenisdata::findOrfail($id);
        $jenisdatas->delete();
        return redirect()->route('jenisdata')->with('success','Jenis Data berhasil dihapus!');
    }
}
