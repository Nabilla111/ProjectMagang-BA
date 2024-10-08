<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ba;
use App\Models\BaGeo;
use App\Models\julda;
use App\Models\juldabelum;
use App\Models\instansi;
use App\Models\Signature;
use App\Models\SignatureProdusen;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;
use Livewire\Component;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Menghitung jumlah total instansi yang terdaftar
        $total_instansi_terdaftar = Instansi::count();

        // Mengambil semua data berita acara dari database
        $bas = Ba::all();
        $bageos = BaGeo::all();

        // Menghitung jumlah total dokumen Berita Acara (BA)
        $total_dokumen = $bas->count();
        $total_dokumen = $bageos->count();

        // Inisialisasi variabel untuk menghitung jumlah dokumen berdasarkan jenis Berita Acara
        $jumlah_statistik_sektoral = 0;
        $jumlah_pemeriksaan_geospasial = 0;
        $jumlah_kesepakatan_format_data = 0;

        // Menghitung jumlah dokumen per jenis BA
        foreach ($bas as $ba) {
            if ($ba->jenis_ba === 'Pemenuhan Data Statistik Sektoral') {
                $jumlah_statistik_sektoral++;
            } elseif ($ba->jenis_ba === 'Kesepakatan Format Data') {
                $jumlah_kesepakatan_format_data++;  // Tambahkan hitungan untuk Kesepakatan Format Data
            }
        }

        foreach ($bageos as $bageo) {
            if ($bageo->jenis_ba === 'Pemeriksaan Data Geospasial') {
                $jumlah_pemeriksaan_geospasial++;
            } 
        }

        // Inisialisasi array untuk menyimpan instansi yang sudah input BA berdasarkan jenis BA
        $instansi_diinput_statistik_sektoral = [];
        $instansi_diinput_geospasial = [];
        $instansi_diinput_kesepakatan_format_data = []; // Tambahkan array untuk Kesepakatan Format Data

        // Looping melalui setiap BA untuk mencatat instansi yang telah menginput dokumen
        foreach ($bas as $ba) {
            if ($ba->jenis_ba === 'Pemenuhan Data Statistik Sektoral' && $ba->instansi !== null) {
                $instansi_diinput_statistik_sektoral[] = $ba->instansi;
            } elseif ($ba->jenis_ba === 'Kesepakatan Format Data' && $ba->instansi !== null) {
                $instansi_diinput_kesepakatan_format_data[] = $ba->instansi; // Catat instansi yang input Kesepakatan Format Data
            }
        }

        foreach ($bageos as $bageo) {
            if ($bageo->jenis_ba === 'Pemeriksaan Data Geospasial' && $bageo->instansi !== null) {
                $instansi_diinput_geospasial[] = $bageo->instansi;
            }
        }
        

        // Menghitung jumlah instansi unik yang sudah input BA berdasarkan jenis BA
        $jumlah_instansi_input_ba_statistik_sektoral = count(array_unique($instansi_diinput_statistik_sektoral));
        $jumlah_instansi_input_bageos_geospasial = count(array_unique($instansi_diinput_geospasial));
        $jumlah_instansi_input_ba_kesepakatan_format_data = count(array_unique($instansi_diinput_kesepakatan_format_data)); // Hitung instansi untuk Kesepakatan Format Data

        // Menghitung persentase instansi yang sudah input BA berdasarkan jenis BA
        $persentase_instansi_statistik_sektoral = ($jumlah_instansi_input_ba_statistik_sektoral / $total_instansi_terdaftar) * 100;
        $persentase_instansi_geospasial = ($jumlah_instansi_input_bageos_geospasial / $total_instansi_terdaftar) * 100;
        $persentase_instansi_kesepakatan_format_data = ($jumlah_instansi_input_ba_kesepakatan_format_data / $total_instansi_terdaftar) * 100; // Persentase Kesepakatan Format Data

        // Mengambil semua nama instansi yang terdaftar
        $instansi_terdaftar = Instansi::pluck('nama_instansi')->toArray();

        // Menghitung instansi yang belum input BA berdasarkan jenis BA
        $instansi_belum_input_statistik_sektoral = array_diff($instansi_terdaftar, $instansi_diinput_statistik_sektoral);
        $instansi_belum_input_geospasial = array_diff($instansi_terdaftar, $instansi_diinput_geospasial);
        $instansi_belum_input_kesepakatan_format_data = array_diff($instansi_terdaftar, $instansi_diinput_kesepakatan_format_data); // Instansi belum input Kesepakatan Format Data

        // Membuat array data yang akan dikirim ke view dashboard
        $data_dashboard = [
            'total_instansi_terdaftar' => $total_instansi_terdaftar,                           // Total instansi yang terdaftar
            'total_dokumen' => $total_dokumen,                                                 // Total dokumen yang telah diinput
            'jumlah_statistik_sektoral' => $jumlah_statistik_sektoral,                         // Jumlah dokumen Pemenuhan Data Statistik Sektoral
            'jumlah_pemeriksaan_geospasial' => $jumlah_pemeriksaan_geospasial,                               // Jumlah dokumen Pemenuhan Data Geospasial
            'jumlah_kesepakatan_format_data' => $jumlah_kesepakatan_format_data,               // Jumlah dokumen Kesepakatan Format Data
            'jumlah_instansi_input_ba_statistik_sektoral' => $jumlah_instansi_input_ba_statistik_sektoral, // Jumlah instansi yang input Pemenuhan Data Statistik Sektoral
            'jumlah_instansi_input_bageos_geospasial' => $jumlah_instansi_input_bageos_geospasial,     // Jumlah instansi yang input Pemenuhan Data Geospasial
            'jumlah_instansi_input_ba_kesepakatan_format_data' => $jumlah_instansi_input_ba_kesepakatan_format_data, // Jumlah instansi yang input Kesepakatan Format Data
            'persentase_instansi_statistik_sektoral' => $persentase_instansi_statistik_sektoral, // Persentase instansi Pemenuhan Data Statistik Sektoral
            'persentase_instansi_geospasial' => $persentase_instansi_geospasial,               // Persentase instansi Pemenuhan Data Geospasial
            'persentase_instansi_kesepakatan_format_data' => $persentase_instansi_kesepakatan_format_data, // Persentase instansi Kesepakatan Format Data
            'instansi_belum_input_statistik' => $instansi_belum_input_statistik_sektoral,      // Daftar instansi yang belum input Pemenuhan Data Statistik Sektoral
            'instansi_belum_input_geospasial' => $instansi_belum_input_geospasial,             // Daftar instansi yang belum input Pemenuhan Data Geospasial
            'instansi_belum_input_kesepakatan_format_data' => $instansi_belum_input_kesepakatan_format_data, // Daftar instansi yang belum input Kesepakatan Format Data
        ];

        // Mengembalikan data ke tampilan dashboard
        return view('dashboard', $data_dashboard);
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
