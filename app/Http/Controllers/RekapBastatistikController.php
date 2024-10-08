<?php

namespace App\Http\Controllers;

use App\Models\rekapbastatistik; // Ganti 'RekapBastatistik' dengan model yang benar
use Illuminate\Http\Request;

class RekapBastatistikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekapbastatistiks = RekapBastatistik::orderBy('created_at', 'DESC')->get();
        return view('rekapbastatistik.index', compact('rekapbastatistiks'));
    }

    public function processBaData()
    {
        // Mengambil semua data Ba
        $bas = Ba::all();

        // Looping melalui setiap data Ba
        foreach ($bas as $ba) {
            // Membuat entri baru di Rekap berdasarkan data Ba
            RekapBastatistik::create([
                'field1' => $ba->field1,
                'field2' => $ba->field2,
                // Menambahkan atribut lain sesuai kebutuhan
            ]);
        }

        // Kembalikan respons atau lakukan tindakan lain sesuai kebutuhan
        return response()->json(['message' => 'Data dari Ba telah diproses dan disimpan di Rekap.']);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Tampilkan form untuk membuat data baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data dari request dan simpan ke dalam database
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Tampilkan detail dari data rekap statistik dengan ID yang diberikan
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Tampilkan form untuk mengedit data rekap statistik dengan ID yang diberikan
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data dari request dan perbarui data rekap statistik dengan ID yang diberikan
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Hapus data rekap statistik dengan ID yang diberikan
    }
}
