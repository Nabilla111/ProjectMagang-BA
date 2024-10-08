<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Ba;
use App\Models\julda;
use App\Models\juldabelum;
use App\Models\kesepakatan;
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

class BaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        
        // $bas = DB::table('bas')->get();
        $bas=Ba::orderBy('created_at', 'DESC')->get();
        $keyword=$request->keyword;
        $bas = Ba::orderBy('created_at', 'DESC')
              ->where('instansi', 'LIKE', '%'.$keyword.'%')
              ->orWhere('tahun', 'LIKE', '%'.$keyword.'%')
              ->orWhere('jenis_ba', 'LIKE', '%'.$keyword.'%')
              ->paginate(10);

        return view('ba.index', compact('bas', 'keyword'));
    }
    public function cetak(string $id)
    {
        // Menggunakan findOrFail untuk menangani jika ID tidak ditemukan
        $bas = Ba::findOrFail($id);
        
        $juldas = Julda::where('bas_id', $id)->get();
        $juldabelums = Juldabelum::where('bas_id', $id)->get();  
        $kesepakatans = Kesepakatan::where('bas_id', $id)->get(); 
    
        $signatures = auth()->user()->id;

        $signatureprodusens = SignatureProdusen::where('bas_id', $id)->first();

        $signatures = Signature::where('bas_id', $id)->first();

        $minggudepan = Carbon::parse($bas->created_at)->addWeek();
        $bulandepan = Carbon::parse($bas->created_at)->addMonth();
       
        return view ('ba.cetak', compact('bas', 'juldas', 'juldabelums', 'kesepakatans', 'signatures', 'minggudepan','bulandepan','signatureprodusens'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ba.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'jenis_ba' => 'required',
        'instansi' => 'required',
        'tanggal_ba' => 'required|date',
        'tahun' => 'required|integer',
        'judul.*' => 'nullable', // Ubah menjadi opsional
        'julket.*' => 'nullable', // Ubah menjadi opsional
        'juduldata.*' => 'nullable',
        'julketbelum.*' => 'nullable',
        'kesepakatan.*' => 'nullable',
        'kesepakatanformat.*' => 'nullable',
    ]);

    $bas = new Ba;
    $bas->jenis_ba = $validatedData['jenis_ba'];
    $bas->instansi = $validatedData['instansi'];
    $bas->tanggal_ba = Carbon::parse($validatedData['tanggal_ba']);
    $bas->tahun = $validatedData['tahun'];
    $bas->save();

    // Periksa apakah bidang 'judul' ada sebelum mengaksesnya
    if ($request->has('judul') && $request->has('julket')) {
        foreach ($validatedData['judul'] as $key => $judul) {
            if (!empty($judul)) {
                $juldas = new julda;
                $juldas->judul_data = $judul;
                $juldas->julket = $validatedData['julket'][$key];
                $juldas->bas_id = $bas->id;
                $juldas->save();  
            }
        }
    }

    // Periksa apakah bidang 'juduldata' ada sebelum mengaksesnya
    if ($request->has('juduldata') && $request->has('julketbelum')) {
        foreach ($validatedData['juduldata'] as $key => $juduldata) {
            if (!empty($juduldata)) {
                $juldabelums = new juldabelum;
                $juldabelums->bas_id = $bas->id;
                $juldabelums->juduldata_belum = $juduldata;
                $juldabelums->julket_belum = $validatedData['julketbelum'][$key];
                $juldabelums->save(); 
            }
        }
    }

    // Periksa apakah bidang 'format data' ada sebelum mengaksesnya
    if ($request->has('kesepakatan') && $request->has('kesepakatanformat')) {
        foreach ($validatedData['kesepakatan'] as $key => $kesepakatan) {
            
            if (!empty($kesepakatan)) {
                $kesepakatans = new kesepakatan;
                $kesepakatans->bas_id = $bas->id;
                $kesepakatans->atribut = $kesepakatan;
                $kesepakatans->tipe_data = $validatedData['kesepakatanformat'][$key];
                $kesepakatans->save(); 
            }
        }
    }   
    
    return redirect()->route('ba')->with('success', 'BA berhasil ditambahkan!');
}  

// public function store(Request $request)
// {
//     $validatedData = $request->validate([
       
//         'judul.*' => 'nullable', // Ubah menjadi opsional
//         'julket.*' => 'nullable', // Ubah menjadi opsional
//         'juduldata.*' => 'nullable',
//         'julketbelum.*' => 'nullable',
//         'kesepakatan.*' => 'nullable',
//         'kesepakatanformat.*' => 'nullable',
//     ]);

//     // $bas = new Ba;
//     // $bas->jenis_ba = $validatedData['jenisba'];
//     // $bas->instansi = $validatedData['instansi'];
//     // $bas->tanggal_ba = Carbon::parse($validatedData['tanggal_ba']);
//     // $bas->tahun = $validatedData['tahun'];
//     // $bas->save();

//     // Periksa apakah bidang 'judul' ada sebelum mengaksesnya
//     if ($request->has('judul') && $request->has('julket')) {
//         foreach ($validatedData['judul'] as $key => $judul) {
//             if (!empty($judul)) {
//                 $juldas = new julda;
//                 $juldas->judul_data = $judul;
//                 $juldas->julket = $validatedData['julket'][$key];
//                 $juldas->bas_id = $bas->id;
//                 $juldas->save();  
//             }
//         }
//     }

//     // Periksa apakah bidang 'juduldata' ada sebelum mengaksesnya
//     if ($request->has('juduldata') && $request->has('julketbelum')) {
//         foreach ($validatedData['juduldata'] as $key => $juduldata) {
//             if (!empty($juduldata)) {
//                 $juldabelums = new juldabelum;
//                 $juldabelums->bas_id = $bas->id;
//                 $juldabelums->juduldata_belum = $juduldata;
//                 $juldabelums->julket_belum = $validatedData['julketbelum'][$key];
//                 $juldabelums->save(); 
//             }
//         }
//     }

//     // Periksa apakah bidang 'format data' ada sebelum mengaksesnya
//     if ($request->has('kesepakatan') && $request->has('kesepakatanformat')) {
//         foreach ($validatedData['kesepakatan'] as $key => $kesepakatan) {
            
//             if (!empty($kesepakatan)) {
//                 $kesepakatans = new kesepakatan;
//                 $kesepakatans->bas_id = $bas->id;
//                 $kesepakatans->atribut = $kesepakatan;
//                 $kesepakatans->tipe_data = $validatedData['kesepakatanformat'][$key];
//                 $kesepakatans->save(); 
//             }
//         }
//     }   
    
//     return redirect()->route('ba')->with('success', 'BA berhasil ditambahkan!');
// } 
    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    $bas = Ba::findOrFail($id);
    $juldas = Julda::where('bas_id', $id)->get();
    $juldabelums = Juldabelum::where('bas_id', $id)->get();  
    $kesepakatans = Kesepakatan::where('bas_id', $id)->get();  
    $minggudepan = Carbon::parse($bas->created_at)->addWeek();
    $bulandepan = Carbon::parse($bas->created_at)->addMonth();
    

    return view('ba.show', compact('bas', 'juldas', 'juldabelums','kesepakatans', 'minggudepan', 'bulandepan'));
}


  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bas = Ba::findOrFail($id);
        return view('ba.edit', compact('bas'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'jenis_ba' => 'required',
        'instansi' => 'required',
        'tanggal_ba' => 'required|date',
        'tahun' => 'required',
        'judul' => 'array',
        'julket' => 'array',
        'juduldata' => 'array',
        'julketbelum' => 'array',
        'kesepakatan' => 'array',
        'kesepakatanformat' => 'array',
    ]);

    $bas = Ba::findOrFail($id);
    $bas->jenis_ba = $validatedData['jenis_ba'];
    $bas->instansi = $validatedData['instansi'];
    $bas->tanggal_ba = $validatedData['tanggal_ba'];
    $bas->tahun = $validatedData['tahun'];

    $bas->julda()->delete(); // hapus data sdh diinput

    if (!empty($validatedData['judul'])) {
        foreach ($validatedData['judul'] as $index => $judul) {
            $bas->julda()->create([
                'judul_data' => $judul,
                'julket' => $validatedData['julket'][$index] ?? null,
            ]);
        }
    }

    $bas->juldabelum()->delete(); // hapus data sdh diinput

    if (!empty($validatedData['juduldata'])) {
        foreach ($validatedData['juduldata'] as $index => $juduldata) {
            $bas->juldabelum()->create([
                'juduldata_belum' => $juduldata,
                'julket_belum' => $validatedData['julketbelum'][$index] ?? null,
            ]);
        }
    }

    $bas->kesepakatan()->delete(); // hapus data sdh diinput

    if (!empty($validatedData['kesepakatan'])) {
        foreach ($validatedData['kesepakatan'] as $index => $kesepakatan) {
            $bas->kesepakatan()->create([
                'atribut' => $kesepakatan,
                'tipe_data' => $validatedData['kesepakatanformat'][$index] ?? null,
            ]);
        }
    }


    $bas->save();

    return redirect()->route('ba')->with('success', 'Berita Acara updated successfully.');
}

  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
            $bas=Ba::findOrfail($id);
            $bas->delete();
            return redirect()->route('ba')->with('success','BA berhasil dihapus!');
    }

    public function tandatangan()
    {
       
        $signatures=Signature::orderBy('created_at', 'DESC')->get();
        // $users=user::where('nip')->get();
        return view('ba.signature', compact('signatures'));
    }
    public function tandatanganprodusen()
    {
        
        $signature_produsens=SignatureProdusen::orderBy('created_at', 'DESC')->get();
        return view('ba.signatureprodusen', compact('signature_produsens'));
    }
    
    public function save(Request $request)
{
    // Validasi data yang diterima dari formulir
    $validatedData = $request->validate([
        'name' => 'required',
        'nip' => 'required',
        'hp' => 'required',
        'ba_id' => 'required', // Validasi ID BA
        'signed' => 'required', // Perbaikan: sesuaikan dengan nama bidang yang digunakan di formulir
    ]);

    // Cari pengguna berdasarkan ID yang sedang masuk
    $users = User::findOrFail(auth()->id());

    $ba_id = $validatedData['ba_id'];
    // Temukan BA berdasarkan ID
    $bas = Ba::findOrFail($ba_id);
    // Simpan tanda tangan ke direktori penyimpanan
    $folderPath = storage_path('app/public/signatures');
    $image_parts = explode(";base64,", $validatedData['signed']);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.' . $image_type;
    $file = $folderPath . '/' . $fileName;
    file_put_contents($file, $image_base64);

    // Simpan data tanda tangan ke dalam database
    $signatures = new Signature();
    $signatures->users_id = $users->id; 
    $signatures->bas_id = $bas->id; 
    $signatures->name = $validatedData['name'];
    $signatures->nip = $validatedData['nip'];
    $signatures->hp = $validatedData['hp'];
    $signatures->signature = $fileName;
    $signatures->save();

    // Kembalikan respons sukses
    return back()->with('success', 'Tanda tangan berhasil disimpan.');
}

public function saveprod(Request $request)
{
    $validatedData = $request->validate([
        'nameprodusen' => 'required',
        'nipprodusen' => 'required',
        'hpprodusen' => 'required',
        'signatureprod' => 'required',
        'ba_id' => 'required', // Validasi ID BA
    ]);
    
    $ba_id = $validatedData['ba_id'];
    
    // Temukan BA berdasarkan ID
    $bas = Ba::findOrFail($ba_id);
    
    // Simpan tanda tangan ke direktori penyimpanan
    $folderPath = storage_path('app/public/signatureprodusens');
    $image_parts = explode(";base64,", $validatedData['signatureprod']);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.' . $image_type;
    $file = $folderPath . '/' . $fileName;
    file_put_contents($file, $image_base64);
 
    // Simpan data tanda tangan ke dalam database
    $signatureprodusens = new SignatureProdusen();
    $signatureprodusens->bas_id = $bas->id; 
    $signatureprodusens->nameprodusen = $validatedData['nameprodusen'];
    $signatureprodusens->nipprodusen = $validatedData['nipprodusen'];
    $signatureprodusens->hpprodusen = $validatedData['hpprodusen'];
    $signatureprodusens->signatureprod = $fileName;
    $signatureprodusens->save();

    // Tanggapan sukses
    return back()->with('success', 'Tanda tangan berhasil disimpan.');
}

        public function getCreatedAtAttributes()
    {
        return \Carbon\Carbon::parse($bas->tanggal_ba)->translatedFormat('l, d F Y');
    }
}