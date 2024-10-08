<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Berita Acara</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5    ; /* Mengatur jarak antar baris */
        }
        p {
            margin-bottom: 25px; /* Mengatur jarak antar paragraf */
            text-align: justify; /* Membuat teks rata kiri-kanan */
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }
        .table-secondary th, .table-secondary td {
            text-align: left; /* Membuat teks di dalam tabel rata kiri */
        }

        .font-size-1 {
            font-size: 1rem;
        }
        .font-size-2 {
            font-size: 1.25rem;
        }
        .font-size-3 {
            font-size: 1.6rem;
        }
        .font-size-4 {
            font-size: 1.80rem;
        }
        .font-size-5 {
            font-size: 2rem;
        }
        .merah {
        color: red;
    }
    .hijau {
        color: green;
    }
    </style>
</head>
<?php
// Misalkan Anda memiliki ID pengguna yang sedang masuk
$users_id = auth()->user()->id;

// Ambil tanda tangan dari basis data sesuai dengan ID pengguna
$signature = App\Models\Signature::where('users_id', $users_id)->first();
?>
<body>
    <div class="container">
        <table width="1000" align="center">
            <tr>  
                <td><center><img src="{{URL('image/pemprov-jateng.png')}}" alt="" width="120" height="120"></center></td>
                <td><center> 
                    <b class="font-size-4">PEMERINTAH PROVINSI JAWA TENGAH</b><br>
                    <b class="font-size-5">DINAS KOMUNIKASI DAN INFORMATIKA</b><br>
                    <span class="font-size-1">Jl. Menteri Supeno I Semarang, Mugassari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50243</span><br>
                    <span class="font-size-1">Surat Elektronik : diskominfo@jatengprov.go.id ; Website : http://diskominfo.jatengprov.go.id</span></center>
                </td>
            </tr>
            <tr>
                <td colspan="2"><hr size="2px" color="black"></td>
            </tr>
        </table>
        <table width="1000" align="center">
      <td><center> 
                <font size ="5"><b>BERITA ACARA</b></font><br>
                <font size ="5"><b><?php $bageos_new=strtoupper("$bageos->jenis_ba"); echo $bageos_new?></b></font><br>
                <font size ="5"><b>TAHUN <?php echo date("Y")?></b></font></center>
      </td>
</tr>
</table>
<table width="1000"  align="center">
<tr>
<td height="30" colspan="2"></td>
</tr>

<td colspan="2" algin="justify"><font size="4"> Kepada Yth. <b><?php echo "$bageos->instansi"?></b><br>
Pada hari ini, <b><?php echo (\Carbon\Carbon::parse($bageos->tanggal_bageo)->translatedFormat('l'))?></b>
tanggal <b><?php echo (\Carbon\Carbon::parse($bageos->tanggal_bageo)->translatedFormat('d'))?></b>
bulan <b><?php echo (\Carbon\Carbon::parse($bageos->tanggal_bageo)->translatedFormat('F'))?></b>
Tahun <b><?php echo (\Carbon\Carbon::parse($bageos->tanggal_bageo)->translatedFormat('Y'))?></b>, saya yang bertanda tangan di bawah ini telah melakukan pemeriksaan data geospasial dengan hasil sebagai berikut: <p>
    
</font>
    <!-- Tabel JuldaGeos -->
    <table align="center" style="width: 100%;">
        @if ($bageos->julda_geos->isNotEmpty())
            @foreach ($bageos->julda_geos as $julda)
                <tr>
                    <td width="150">Judul Data</td>
                    <td>: {{ $julda->judul_data?? '-'  }}</td>
                </tr>
                <tr>
                    <td>Waktu Unggah</td>
                    <td>: {{ $julda->waktu_unggah ? \Carbon\Carbon::parse($julda->waktu_unggah)->translatedFormat('d F Y') : '-' }}</td>
                </tr>
                <tr>
                    <td>Duplikasi</td>
                    <td>: {{ $julda->duplikasi ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Jenis Data</td>
                    <td>: {{ $julda->jenis_data?? '-'  }}</td>
                </tr>
                <tr>
                    <td>Periode</td>
                    <td>: {{ $julda->periode ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td>: {{ $julda->catatan ?? '-'  }}</td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="2">Tidak ada data</td>
            </tr>
        @endif
    </table>

    <!-- Tabel StandarDataGeos -->
    <table align="center" style="width: 100%;">
        @if ($bageos->standardatageos->isNotEmpty())
            <tr>
                <td colspan="2"><b>Ketersediaan Standar/Pedoman Data Geospasial dari Unit Produksi</b></td>
            </tr>
            <tr>
                <td colspan="2"><b>1. Standar/Pedoman Data Geospasial</b></td>
            </tr>

            @foreach ($bageos->standardatageos as $julda)
                <tr>
                    <td width="150">Bentuk</td>
                    <td>: {{ $julda->bentuk ?? 'Belum Ada' }}</td>
                </tr>
                <tr>
                    <td>Nomor</td>
                    <td>: {{ $julda->nomor ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: {{ $julda->tanggal ? \Carbon\Carbon::parse($julda->tanggal)->translatedFormat('d F Y') : '-' }}</td>
                </tr>
                <tr>
                    <td>Konsep</td>
                    <td>: {{ $julda->konsep ?? 'Layanan/jaringan JOL (Jateng Online)' }}</td>
                </tr>
                <tr>
                    <td>Definisi</td>
                    <td>: {{ $julda->definisi ?? 'OPD, Balai, UPT Provinsi Jawa Tengah yang tersambung dengan layanan/jaringan JOL' }}</td>
                </tr>
                <tr>
                    <td>Klasifikasi</td>
                    <td>: {{ $julda->klasifikasi ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Ukuran</td>
                    <td>: {{ $julda->ukuran ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Satuan</td>
                    <td>: {{ $julda->satuan ?? '-' }}</td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="2">Tidak ada data Standar Data Geospasial</td>
            </tr>
        @endif
    </table>

    <!-- Tabel infomasikugi-->
    <table align="center" style="width: 100%;">
        @if ($bageos->informasikugis->isNotEmpty())
            <tr>
                <td colspan="2"><b>2. Kesesuaian Data dengan Struktur Data (KUGI)</b></td>
            </tr>

            @foreach ($bageos->informasikugis as $julda)
                <tr>
                    <td width="150">Kode Unsur</td>
                    <td>: {{ $julda->kode_unsur ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Nama Unsur</td>
                    <td>: {{ $julda->nama_unsur ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Nama Alias</td>
                    <td>: {{ $julda->nama_alias ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Fitur</td>
                    <td>: {{ $julda->fitur ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Format Data</td>
                    <td>: {{ $julda->format_data ?? '-' }}</td>
                </tr>
                <tr>
                    <td>SRS/CRS</td>
                    <td>: {{ $julda->SRSCRS ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Skala</td>
                    <td>: {{ $julda->skala ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Atribut</td>
                    <td>: {{ $julda->atribut ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td>: {{ $julda->catatan ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Saran</td>
                    <td>: {{ $julda->saran ?? '-' }}</td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="2">Tidak ada data</td>
            </tr>
        @endif
    </table>

    <!-- Tabel metadatageo -->
    <table align="center" style="width: 100%;">
        @if ($bageos->metadatageos->isNotEmpty())
            <tr>
                <td colspan="2"><b>3.Metadata Data Geospasial</b></td>
            </tr>

            @foreach ($bageos->metadatageos as $julda)
                <tr>
                    <td width="150">Nama</td>
                    <td>: {{ $julda->nama ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Format Data</td>
                    <td>: {{ $julda->format_data ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td>: {{ $julda->catatan ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Saran</td>
                    <td>: {{ $julda->saran ?? '-' }}</td>
                </tr>
                <tr>
                    <td colspan="2"><hr></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="2">Tidak ada data</td>
            </tr>
        @endif
    </table>

    <!-- Tabel penjaminankualitas -->
    <table align="center" style="width: 100%;">
        @if (isset($bageos->penjaminankualitas) && $bageos->penjaminankualitas->isNotEmpty())
            <tr>
                <td colspan="2"><b>Penjaminan Kualitas Data Geospasial</b><br>Sesuai Surat Edaran Kepala BIG  Nomor 6 Tahun 2021 tentang Pedoman Standar Data dan Struktur dan Format Baku Metadata Spasial</td>
            </tr>

            @foreach ($bageos->penjaminankualitas as $julda)
                <tr>
                    <td width="170">Kelengkapan Dataset</td>
                    <td>: {{ $julda->kelengkapan_dataset ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Konsistensi Logis</td>
                    <td>: {{ $julda->konsistensi_logis ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Akurasi Posisi</td>
                    <td>: {{ $julda->akurasi_posisi ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Akurasi Tematik</td>
                    <td>: {{ $julda->akurasi_tematik ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Akurasi Temporal</td>
                    <td>: {{ $julda->akurasi_temporal ?? '-' }}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="2">Tidak ada data</td>
            </tr>
        @endif
    </table>
    
    <table width="1000" align="center">
    <tr>
        <td width="500"></td>
        <td width="5"></td>
        <td width="300"></td>
        <td width="200"></td>
        <td width="450"> <p>Semarang, {{ \Carbon\Carbon::parse($bageos->tanggal_bageo)->translatedFormat('d F Y') }}</p>
        </td>
        <td width="5"></td>
        <td width="300"></td>
      </tr>
    <tr>
        <td width="95"></td>
        <td width="5"></td>
        <td width="300"></td>
        <td width="200"></td>
        <td width="450"> <p>Diperiksa Oleh <br> Walidata Daerah Provinsi Jawa Tengah</p></td>
        <td width="5"></td>
        <td width="300"></td>
      </tr>
    <tr>
        <td width="95"></td>
        <td width="5"></td>
        <td width="300"></td>
        <td width="200"></td>
        <td width="450"> @if ($bageos->ttdKabid) <!-- Pastikan ada data tanda tangan -->
                <div>
                    <img src="{{ asset('storage/' . $bageos->ttdKabid->ttd) }}" alt="Tanda Tangan" width="120" height="100" ><br>
                    <strong>{{ $bageos->ttdKabid->nama }}</strong><br>
                    NIP: {{ $bageos->ttdKabid->nip ?? '-' }} <!-- Ganti 'nip' sesuai dengan nama kolom di database -->
                </div>
            @else
                <p>Tanda tangan belum tersedia.</p>
            @endif</td>
        <td width="5"></td>
        <td width="300"></td>
      </tr>
</table>
   

    <script type="text/javascript">
        window.print();

    </script>
</body>
</html>
