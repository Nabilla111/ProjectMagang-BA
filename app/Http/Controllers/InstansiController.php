<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\instansi;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instansis=Instansi::orderBy('created_at', 'DESC')->get();
        return view('instansi.index', compact('instansis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instansi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            //dd($request->all());
            $validatedData = $request->validate([
            'nama_instansi' => 'required',
             'alamat' => 'required',
            'telepon'=>'required',
           ]);  
            
        Instansi::create($validatedData);
        return redirect()->route('instansi')->with('success','Tambah Instansi Sukses');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $instansis=Instansi::findOrfail($id);
        return view ('instansi.show', compact('instansis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $instansis=Instansi::findOrfail($id);
        return view ('instansi.edit', compact('instansis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $instansis=Instansi::findOrfail($id);
        $instansis->update($request->all());
        return redirect()->route('instansi')->with('success','Instansi berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instansis=Instansi::findOrfail($id);
        $instansis->delete();
        return redirect()->route('instansi')->with('success','Instansi berhasil dihapus!');
    }
}
