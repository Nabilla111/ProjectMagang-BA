<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TtdKabid;

class TtdKabidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ttd_kabids = TtdKabid::orderBy('created_at', 'DESC')->get();
        return view('ttd.index', compact('ttd_kabids'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ttd.create');
    }

    // Menyimpan data baru ke tabel ttd_kabids
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'jabatan' => 'required|string',
            'nip' => 'required|string',
            'ttd' => 'required|file|mimes:png,jpg,jpeg', // Validasi file
        ]);

        // Simpan file tanda tangan
        $filepath = $request->file('ttd')->store('ttd_kabids', 'public');

        TtdKabid::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'nip' => $request->nip,
            'ttd' => $filepath,
        ]);

        return redirect()->route('ttd.index')->with('success', 'Tanda tangan berhasil diunggah.');
    }

    // Menampilkan data spesifik berdasarkan ID
    public function show($id)
    {
        $ttd_kabid = TtdKabid::find($id);

        if (!$ttd_kabid) {
            return response()->json(['message' => 'Data not found'], 404);
        }

        return response()->json($ttd_kabid);
    }

    public function edit($id)
    {
        $ttd_kabids = TtdKabid::findOrFail($id);
        return view('ttd.edit', compact('ttd_kabids'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|string',
        'jabatan' => 'required|string',
        'nip' => 'required|string',
        'ttd' => 'nullable|file|mimes:png,jpg,jpeg',
    ]);

    // Fetch the instance
    $ttd_kabids = TtdKabid::findOrFail($id);
// dd($ttd_kabids); // This will dump the instance and stop execution.


    // Update the properties
    $ttd_kabids->nama = $request->nama;
    $ttd_kabids->jabatan = $request->jabatan;
    $ttd_kabids->nip = $request->nip;

    // Handle the file upload
    if ($request->hasFile('ttd')) {
        $filepath = $request->file('ttd')->store('ttd_kabids');
        $ttd_kabids->ttd = $filepath;
    }

    // Save the instance
    $ttd_kabids->save();

    return redirect()->route('ttd.index')->with('success', 'Tanda tangan berhasil diupdate.');
}

    public function saveTtd(Request $request)
    {
        // Validasi ID tanda tangan
        $validated = $request->validate([
            'id_ttd' => 'required|exists:ttd_kabids,id',
        ]);

        // Proses penyimpanan data yang diperlukan
        try {
            // Cari tanda tangan berdasarkan ID
            $selectedTtd = TtdKabid::findOrFail($request->id_ttd);

            // Lakukan proses yang diperlukan, seperti menyimpan ID atau gambar tanda tangan
            // Contoh menyimpan tanda tangan ke session atau database
            session(['selectedKabid' => $selectedTtd]);

            return response()->json(['message' => 'Tanda tangan berhasil disimpan']);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan tanda tangan.'], 500);
        }
    }


    // Menghapus data berdasarkan ID
    public function destroy($id)
{
    $ttd_kabid = TtdKabid::find($id);

    if (!$ttd_kabid) {
        return redirect()->route('ttd.index')->with('error', 'Data not found');
    }

    // Jika file tanda tangan disimpan, hapus juga file dari storage
    if ($ttd_kabid->ttd && \Storage::exists($ttd_kabid->ttd)) {
        \Storage::delete($ttd_kabid->ttd);
    }

    $ttd_kabid->delete();

    return redirect()->route('ttd.index')->with('success', 'Tanda tangan berhasil dihapus.');
}

}