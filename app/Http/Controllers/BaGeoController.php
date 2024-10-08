<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JuldaGeo;
use App\Models\jenisdata;
use App\Models\MetadataGeo;
use App\Models\InformasiKugi;
use App\Models\PenjaminanKualitas;
use App\Models\StandardataGeo;
use App\Models\TtdKabid;
use App\Models\Bageo;
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

class BaGeoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $bageos = DB::table('bageos')->get();
        $bageos=Bageo::orderBy('created_at', 'DESC')->get();
        // $keyword=$request->keyword;
        // $bas = Bageo::orderBy('created_at', 'DESC')
        //       ->where('instansi', 'LIKE', '%'.$keyword.'%')
        //       ->orWhere('tahun', 'LIKE', '%'.$keyword.'%')
        //       ->orWhere('jenis_bageo', 'LIKE', '%'.$keyword.'%')
        //       ->paginate(10);

        return view('bageo.index', compact('bageos'));
    }

    /**
     * Show the form for creating a new resource.
     */
   
    public function createStep1()
    {
        return view('bageo.createStep1');
    }
    
    public function postStep1(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'jenis_ba' => 'required',
            'instansi' => 'required',
            'tanggal_bageo' => 'required|date',
            'tahun' => 'required|integer',
            'id_ttd' => 'required|integer',
        ]);
    
        // Simpan data ke session sementara
        $request->session()->put('bageo_data_step1', $validatedData);
    
        // Redirect ke step 2
        return redirect()->route('bageo.createStep2');
    }

public function createStep2()
{
    return view('bageo.createStep2');
}
public function postStep2(Request $request)
{
    // Validasi data judul data
    $validatedData = $request->validate([
        'judul_data' => 'required',
        'waktu_unggah' => 'required',
        'duplikasi' => 'required',
        'jenis_data' => 'required',
        'periode' => 'required',
        'catatan' => 'nullable',
    ]);

    $request->session()->put('bageo_data_step2', $validatedData);

    return redirect()->route('bageo.createStep3');
}

public function createStep3()
{
    return view('bageo.createStep3');
}
public function postStep3(Request $request)
{
    // Validasi data standardata
    $validatedData = $request->validate([
        'bentuk' => 'required',
        'nomor' => 'required',
        'tanggal' => 'required',
        'konsep' => 'required',
        'definisi' => 'required',
        'klasifikasi' => 'required',
        'ukuran' => 'required',
        'satuan' => 'nullable',
    ]);

    $request->session()->put('bageo_data_step3', $validatedData);

    return redirect()->route('bageo.createStep4');
}

public function createStep4()
{
    return view('bageo.createStep4');
}
public function postStep4(Request $request)
{
    // Validasi data informasi kugi
    $validatedData = $request->validate([
        'kode_unsur' => 'required',
        'nama_unsur' => 'required',
        'nama_alias' => 'required',
        'fitur' => 'required',
        'format_data' => 'required',
        'SRSCRS' => 'required',
        'skala' => 'required',
        'atribut' => 'required',
        'catatan' => 'nullable',
        'saran' => 'nullable',
    ]);

    $request->session()->put('bageo_data_step4', $validatedData);

    return redirect()->route('bageo.createStep5');
}

public function createStep5()
{
    return view('bageo.createStep5');
}

public function postStep5(Request $request)
{
    // Validasi data untuk MetadataGeo
    $metadataValidatedData = $request->validate([
        'nama' => 'required',
        'format_data' => 'required',
        'catatan' => 'nullable',
        'saran' => 'nullable',
    ]);

    // Validasi data untuk PenjaminanKualitas
    $penjaminanValidatedData = $request->validate([
        'kelengkapan_dataset' => 'required',
        'konsistensi_logis' => 'required',
        'akurasi_posisi' => 'required',
        'akurasi_tematik' => 'required',
        'akurasi_temporal' => 'required',
    ]);

    // Simpan data ke session
    $request->session()->put('bageo_data_step5_metadata', $metadataValidatedData);
    $request->session()->put('bageo_data_step5_penjaminan', $penjaminanValidatedData);

    return redirect()->route('bageo.konfirmasi');
}

public function konfirmasi(Request $request)
{
    // Ambil semua data dari session
    $bageoDataStep1 = $request->session()->get('bageo_data_step1');
    $bageoDataStep2 = $request->session()->get('bageo_data_step2');
    $bageoDataStep3 = $request->session()->get('bageo_data_step3');
    $bageoDataStep4 = $request->session()->get('bageo_data_step4');
    $metadataValidatedData = $request->session()->get('bageo_data_step5_metadata');
    $penjaminanValidatedData = $request->session()->get('bageo_data_step5_penjaminan');

    // dd($bageoDataStep1, $bageoDataStep2, $bageoDataStep3, $bageoDataStep4, $bageoDataStep5);
    // Pastikan semua data tersedia
    if (!$bageoDataStep1 || !$bageoDataStep2 || !$bageoDataStep3 || !$bageoDataStep4 || !$metadataValidatedData|| !$penjaminanValidatedData) {
        return redirect()->route('bageo.createStep1')->withErrors('Data tidak lengkap, mohon isi semua step.');
    }

    // Kirim data ke view konfirmasi
    return view('bageo.konfirmasi', compact('bageoDataStep1', 'bageoDataStep2', 'bageoDataStep3','bageoDataStep4', 'metadataValidatedData', 'penjaminanValidatedData'));
}

public function storeBageo(Request $request)
{
    // Ambil data dari session
    $bageoDataStep1 = $request->session()->get('bageo_data_step1');
    $bageoDataStep2 = $request->session()->get('bageo_data_step2');
    $bageoDataStep3 = $request->session()->get('bageo_data_step3');
    $bageoDataStep4 = $request->session()->get('bageo_data_step4');
    $metadataData = $request->session()->get('bageo_data_step5_metadata');
    $penjaminanData = $request->session()->get('bageo_data_step5_penjaminan');

    // Simpan data ke database
    $bageos = Bageo::create($bageoDataStep1);
    JuldaGeo::create(array_merge($bageoDataStep2, ['bageos_id' => $bageos->id]));
    StandardataGeo::create(array_merge($bageoDataStep3, ['bageos_id' => $bageos->id]));
    InformasiKugi::create(array_merge($bageoDataStep4, ['bageos_id' => $bageos->id]));

    // Simpan data ke MetadataGeo dan PenjaminanKualitas
    MetadataGeo::create(array_merge($metadataData, ['bageos_id' => $bageos->id]));
    PenjaminanKualitas::create(array_merge($penjaminanData, ['bageos_id' => $bageos->id]));

    // Hapus data session setelah selesai
    $request->session()->forget(['bageo_data_step1', 'bageo_data_step2', 'bageo_data_step3', 'bageo_data_step4', 'bageo_data_step5_metadata', 'bageo_data_step5_penjaminan']);

    return redirect()->route('bageo')->with('success', 'BA berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     */
public function show(string $id)
{
    // Mengambil data Bageo beserta semua relasi yang diperlukan dalam satu query
    $bageos = Bageo::with([
        'julda_geos',
        'standardatageos',
        'informasikugis',
        'metadatageos',
        'penjaminankualitas',
        'ttdKabid'
    ])->findOrFail($id);

    // Data TTD Kabid untuk ditampilkan di modal
    $ttd_kabids = TtdKabid::all();

    // Ambil tanda tangan yang dipilih dari session
    $selectedTtdId = session('selected_ttd');
    $selectedKabid = $selectedTtdId ? TtdKabid::find($selectedTtdId) : null;

    // Passing data ke view
    return view('bageo.show', compact('bageos', 'ttd_kabids', 'selectedKabid'));
}
public function edit(string $id)
{
    // Get the specific Bageo record
    $bageo = Bageo::with(['julda_geos', 'standardatageos', 'informasikugis', 'metadatageos', 'penjaminankualitas'])->findOrFail($id);

    // Pass the data to the edit view
    return view('bageo.editStep1', compact('bageo'));
}

        /**
     * Show the form for editing the specified resource.
     */
    public function editStep1($id)
{
    $bageo = Bageo::findOrFail($id); // Mendapatkan data Bageo

    return view('bageo.editStep1', [
        'bageo' => $bageo 
    ]);
}

public function updateStep1(Request $request, $id)
{
    $validatedData = $request->validate([
        'id_ttd' => 'required',
        'jenis_ba' => 'required',
        'instansi' => 'required',
        'tanggal_bageo' => 'required|date',
        'tahun' => 'required|integer',
    ]);

    $bageo = Bageo::findOrFail($id);
    $bageo->update($validatedData); // Mengupdate data

    return redirect()->route('bageo.editStep2', $bageo->id); // Redirect ke langkah berikutnya
}

public function editStep2($id)
{
    $bageo = Bageo::findOrFail($id);
    $julda_geos = $bageo->julda_geos()->first();

    // Mengambil data jenis data
    $jenisDatas = JenisData::orderBy('jenisdata', 'ASC')->get(); // Pastikan ini ada dan sesuaikan nama modelnya

    return view('bageo.editStep2', compact('bageo', 'julda_geos', 'jenisDatas'));
}


public function updateStep2(Request $request, $id)
{
    $validatedData = $request->validate([
        'judul_data' => 'required',
        'waktu_unggah' => 'required',
        'duplikasi' => 'required',
        'jenis_data' => 'required',
        'periode' => 'required',
        'catatan' => 'nullable',
    ]);

    $bageo = Bageo::findOrFail($id);
    // Update data langkah 2
    $juldaGeo = $bageo->julda_geos()->first(); // Asumsikan ada satu JuldaGeo terkait
    if ($juldaGeo) {
        $juldaGeo->update($validatedData); // Mengupdate jika ada
    } else {
        // Buat jika tidak ada
        $validatedData['bageos_id'] = $bageo->id;
        JuldaGeo::create($validatedData);
    }
    // return redirect()->route('bageo.editStep1', $bageo->id)->with('error', 'Data tidak ditemukan.');
    return redirect()->route('bageo.editStep3', $bageo->id); // Redirect ke langkah berikutnya
}

// step 3
public function editStep3($id)
{
    $bageo = Bageo::findOrFail($id);
    $standardataGeo = $bageo->standardatageos()->first(); // Mengambil relasi StandardataGeo

    // Konversi tanggal menjadi objek Carbon jika tidak null
    if ($standardataGeo && $standardataGeo->tanggal) {
        $standardataGeo->tanggal = Carbon::parse($standardataGeo->tanggal);
    }

    return view('bageo.editStep3', compact('bageo', 'standardataGeo'));
}
public function updateStep3(Request $request, $id)
{
    $validatedData = $request->validate([
        'bentuk' => 'required',
        'nomor' => 'required',
        'tanggal' => 'required|date',
        'konsep' => 'required',
        'definisi' => 'required',
        'klasifikasi' => 'required',
        'ukuran' => 'required',
        'satuan' => 'nullable',
    ]);

    $bageo = Bageo::findOrFail($id);
    // Mengambil StandardataGeo terkait
    $standardataGeo = $bageo->standardatageos()->first();

    if ($standardataGeo) {
        // Jika ada data, update
        $standardataGeo->update($validatedData);
    } else {
        // Jika tidak ada, buat baru
        $validatedData['bageos_id'] = $bageo->id; // Tambahkan foreign key
        StandardataGeo::create($validatedData);
    }

    return redirect()->route('bageo.editStep4', $bageo->id); // Redirect ke langkah berikutnya
}


// step 4
public function editStep4($id)
{
    $bageo = Bageo::findOrFail($id);
    
    // Get the related InformasiKugi
    $informasiKugi = $bageo->informasikugis()->first(); // Assuming there is only one related record

    // Pass the data to the view
    return view('bageo.editStep4', compact('bageo', 'informasiKugi'));
}

public function updateStep4(Request $request, $id)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'kode_unsur' => 'required',
        'nama_unsur' => 'required',
        'nama_alias' => 'required',
        'fitur' => 'required',
        'format_data' => 'required',
        'SRSCRS' => 'required',
        'skala' => 'required',
        'atribut' => 'required',
        'catatan' => 'nullable',
        'saran' => 'nullable',
    ]);

    // Find the Bageo record
    $bageo = Bageo::findOrFail($id);
    
    // Get or create the related InformasiKugi
    $informasiKugi = $bageo->informasikugis()->first();
    
    if ($informasiKugi) {
        // Update if the InformasiKugi record exists
        $informasiKugi->update($validatedData);
    } else {
        // Create a new record if it doesn't exist
        $validatedData['bageos_id'] = $bageo->id; // Add foreign key
        InformasiKugi::create($validatedData);
    }

    // Redirect to the next step
    return redirect()->route('bageo.editStep5', $bageo->id);
}


// step 5
public function editStep5($id)
{
    $bageo = Bageo::findOrFail($id);
    // Get the related MetadataGeo and PenjaminanKualitas
    $metadataGeo = $bageo->metadatageos()->first(); // Assuming there is only one related record
    $penjaminanKualitas = $bageo->penjaminankualitas()->first(); // Assuming there is only one related record

    return view('bageo.editStep5', [
        'bageo' => $bageo,
        'metadataGeo' => $metadataGeo, // Pass the related data to the view
        'penjaminanKualitas' => $penjaminanKualitas // Pass the related data to the view
    ]);
}

public function updateStep5(Request $request, $id)
{
    // Validate data for MetadataGeo
    $metadataValidatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'format_data' => 'required|string',
        'catatan' => 'nullable|string',
        'saran' => 'nullable|string',
    ]);

    // Validate data for PenjaminanKualitas
    $penjaminanValidatedData = $request->validate([
        'kelengkapan_dataset' => 'required|string',
        'konsistensi_logis' => 'required|string',
        'akurasi_posisi' => 'required|string',
        'akurasi_tematik' => 'required|string',
        'akurasi_temporal' => 'required|string',
    ]);

    $bageo = Bageo::findOrFail($id);

    // Update the related MetadataGeo
    $metadataGeo = $bageo->metadatageos()->first();
    if ($metadataGeo) {
        $metadataGeo->update($metadataValidatedData); // Update if exists
    } else {
        // Create a new record if it doesn't exist
        $metadataValidatedData['bageos_id'] = $bageo->id;
        MetadataGeo::create($metadataValidatedData);
    }

    // Update the related PenjaminanKualitas
    $penjaminanKualitas = $bageo->penjaminankualitas()->first();
    if ($penjaminanKualitas) {
        $penjaminanKualitas->update($penjaminanValidatedData); // Update if exists
    } else {
        // Create a new record if it doesn't exist
        $penjaminanValidatedData['bageos_id'] = $bageo->id;
        PenjaminanKualitas::create($penjaminanValidatedData);
    }

    return redirect()->route('bageo.index')->with('success', 'Data berhasil diedit.');
}

public function konfirmasiEdit($id)
    {
        // Fetch the Bageo data from the previous steps
        $bageo = Bageo::find($id);
        
        // Assuming data from previous steps are stored in session or passed via request
        $bageoDataStep1 = session('bageoDataStep1');
        $bageoDataStep2 = session('bageoDataStep2');
        $bageoDataStep3 = session('bageoDataStep3');
        $bageoDataStep4 = session('bageoDataStep4');
        $metadataValidatedData = session('metadataValidatedData');
        $penjaminanValidatedData = session('penjaminanValidatedData');
        
        // Return the view with the data passed to it
        return view('bageo.konfirmasiEdit', compact(
            'bageo', 
            'bageoDataStep1', 
            'bageoDataStep2', 
            'bageoDataStep3', 
            'bageoDataStep4', 
            'metadataValidatedData', 
            'penjaminanValidatedData'
        ));
    }

public function cetak(string $id)
    {
        // Menggunakan findOrFail untuk menangani jika ID tidak ditemukan
        $bageos = Bageo::with([
            'julda_geos',
            'standardatageos',
            'informasikugis',
            'metadatageos',
            'penjaminankualitas',
            'ttdKabid'
        ])->findOrFail($id);
    
        // Data TTD Kabid untuk ditampilkan di modal
        $ttd_kabids = TtdKabid::all();
    
        // Ambil tanda tangan yang dipilih dari session
        $selectedTtdId = session('selected_ttd');
        $selectedKabid = $selectedTtdId ? TtdKabid::find($selectedTtdId) : null;
    
        // Passing data ke view
        return view('bageo.cetak', compact('bageos', 'ttd_kabids', 'selectedKabid'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan Bageo dan hapus
        $bageos = Bageo::findOrFail($id);
        $bageos->julda_geos()->delete();
        $bageos->standardatageos()->delete();
        $bageos->informasikugis()->delete();
        $bageos->metadatageos()->delete();
        $bageos->penjaminankualitas()->delete();
        
        $bageos->delete();

        return redirect()->route('bageo')->with('success', 'BA berhasil dihapus!');
    }

}
