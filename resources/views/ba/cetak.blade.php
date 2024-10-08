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
            <tr>  
                <td><center> 
                    <b class="font-size-3"> BERITA ACARA</b></font><br>
                    <b class="font-size-3"><?php $bas_new=strtoupper("$bas->jenis_ba"); echo $bas_new?></b></font><br>
                    <b class="font-size-3">TAHUN <?php echo date("Y")?></b></font></center>
                </td>
            </tr>
        </table>
        <table width="1000"  align="center">
            <tr>
                <td height="30" colspan="2"></td>
            </tr>
            <td colspan="2" align="justify" class="font-size-2">Telah dilaksanakan <?php echo "$bas->jenis_ba"?> Tahun <b> <?php echo "$bas->tahun"?> </b> pada <b><?php echo "$bas->instansi"?></b>
            hari <b><?php echo (\Carbon\Carbon::parse($bas->tanggal_ba)->translatedFormat('l'))?></b>
            tanggal <b><?php echo (\Carbon\Carbon::parse($bas->tanggal_ba)->translatedFormat('d'))?></b>
            bulan <b><?php echo (\Carbon\Carbon::parse($bas->tanggal_ba)->translatedFormat('F'))?></b>
            Tahun <b><?php echo (\Carbon\Carbon::parse($bas->tanggal_ba)->translatedFormat('Y'))?></b> melalui Portal Satu Data Jawa Tengah. Adapun Judul Data sebagai berikut :<p>
            </font>
            <p class="font-size-2"> 
                <table>
                    <thead class="table-secondary">
                        <tr>
                            <th width="50">No </th>
                            <th width="800">Judul Data</th>
                            <th width="150">Tahun</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($juldas->count() > 0)
                            @foreach ($juldas as $key => $row)
                            <tr>
                                <td class="align-middle">{{$key+1}}</td>
                                <td class="align-middle">{{$row->judul_data}}</td>
                                <td class="align-middle">{{$row->julket}}</td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="text-center"colspan="5">-tidak ada judul data-</td>
                                <td height="30"></td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </font></p>

            <!-- tindaklanjut -->
             @if($juldabelums->isNotEmpty())
            <p class="font-size-2">Tindaklanjut <?php echo "$bas->jenis_ba"?> adalah sebagai berikut : <p></font></p>
            <p class="font-size-2">
                <table>
                    <thead class="table-secondary">        
                        <tr>
                            <th width="50">No</th>
                            <th width="800">Judul Data</th>
                            <th width="150">Tahun</th>
                        </tr>
                    </thead>
                </font></p>
                <tbody>
                    @if($juldabelums->count() > 0)
                        @foreach ($juldabelums as $k => $v)
                        <tr>
                            <td class="align-middle">{{$k+1}}</td>
                            <td class="align-middle">{{$v->juduldata_belum}}</td>
                            <td class="align-middle">{{$v->julket_belum}}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center"colspan="5"align="center">-tidak ada tindaklanjut-</td>
                            <td height="30"></td>
                        </tr>
                    @endif
                </tbody>
                @endif
            </table>

            <!-- format data -->
             @if($kesepakatans->isNotEmpty())  
            <p class="font-size-2">Hasil <?php echo "$bas->jenis_ba"?> adalah sebagai berikut : <p></font></p>
            <p class="font-size-2">
                <table>
                    <thead class="table-secondary">        
                        <tr>
                            <th width="50">No</th>
                            <th width="800">Nama Kolom</th>
                            <th width="150">Tipe Data</th>
                        </tr>
                    </thead>
                </font></p>
                <tbody>
                    @if($kesepakatans->count() > 0)
                        @foreach ($kesepakatans as $k => $v)
                        <tr>
                            <td class="align-middle">{{$k+1}}</td>
                            <td class="align-middle">{{$v->atribut}}</td>
                            <td class="align-middle">{{$v->tipe_data}}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td class="text-center"colspan="5"align="center">-tidak ada tindaklanjut-</td>
                            <td height="30"></td>
                        </tr>
                    @endif
                </tbody>
                @endif
            </table>
            @if($juldabelums->isNotEmpty())
<p class="justify"><font size="4">Jika ada Judul Data yang belum dipenuhi oleh <b><?php echo "$bas->instansi"?></b> sesuai 
    dengan tabel kesepakatan tindaklanjut diatas dimohon untuk dipenuhi maksimal pada Hari <b><?php echo $minggudepan->translatedFormat('l')?></b> tanggal <b><?php echo $minggudepan->translatedFormat(' d F Y') ?></b>.<p>
    <p class="justify"><font size="4">Demikian Berita Acara ini disusun dan disepakati oleh Walidata Daerah bersama <b><?php echo "$bas->instansi"?></b> sebagai Walidata Pendukung/Produsen Data.</p>
</font>
@endif
@if($kesepakatans->isNotEmpty())  
<p class="justify"><font size="4">Demikian Berita Acara ini disusun dan disepakati oleh Walidata Daerah bersama <b><?php echo "$bas->instansi"?></b> sebagai Walidata Pendukung/Produsen Data untuk ditindak lanjuti dengan membuat tabel di Portal Data Jawa Tengah sesuai kesepakatan format tabel di atas paling lambat <b><?php echo $bulandepan->translatedFormat(' d F Y') ?> </b>.<p>
</font>
@endif
            <tr>
                <td height="30"></td>
            </tr>
            <table width="1000" align="center" class="font-size-2">        
                <tr>
                    <td width="400">Produsen Data</td>
                    <td width="200"></td>
                    <td width="400">Walidata Daerah</td>
                </tr>
                <tr>
                    <td><?php echo "$bas->instansi"?></td>
                    <td></td>
                    <td>Dinas Komunikasi dan Informatika<br>Provinsi Jawa Tengah</td>
                </tr>
            </table>            
            <table width="1000" align="center">
                <tr>    
                    <td width="400">
                        @if($signatureprodusens)
                            <img src="{{ asset('storage/signatureprodusens/' . $signatureprodusens->signatureprod)}}" alt="Tanda Tangan Produsen" width="300" height="200">
                        @else
                            <p class="merah">belum melakukan tanda tangan!</p>
                        @endif
                    </td>                    
                    <td width="200"></td>
                    <td width="400"> 
                        @if($signatures)
                            <img src="{{ asset('storage/signatures/' . $signatures->signature) }}" alt="Tanda Tangan">
                        @else
                            <p class="merah">belum melakukan tanda tangan!</p>
                        @endif
                    </td>
                </tr>
                <tr>
                </tr>
            </table>
            <table width="1000" align="center" class="font-size-2">
                <tr>
                    <td width="95">Nama</td>
                    <td width="5">:</td>
                    <td width="300">
                        @if($signatureprodusens)
                            {{ $signatureprodusens->nameprodusen }}
                        @else
                            <p class="merah"></p>
                        @endif
                    </td>
                    <td width="200"></td>
                    <td width="95">Nama</td>
                    <td width="5">:</td>
                    <td width="300">
                    @if($signatures)
                        {{ $signatures->name }}
                    @else
                        <p class="merah"></p>
                    @endif
                </td>
                </tr>
                <tr>
                    <td width="95">NIP</td>
                    <td width="5">:</td>
                    <td width="300">@if($signatureprodusens)
                        {{ $signatureprodusens->nipprodusen }}
                    @else
                        <p class="merah"></p>
                    @endif</td>
                    <td width="200"></td>
                    <td width="95">NIP</td>
                    <td width="5">:</td>
                    <td width="300">
                    @if($signatures)
                        {{ $signatures->nip }}
                    @else
                        <p class="merah"></p>
                    @endif
                </td>
                </tr>
                <tr>
                    <td width="95">No. HP</td>
                    <td width="5">:</td>
                    <td width="300">
                    @if($signatureprodusens)
                        {{ $signatureprodusens->hpprodusen }}
                    @else
                        <p class="merah"></p>
                    @endif
                 </td>
                    <td width="200"></td>
                    <td width="95">No.HP</td>
                    <td width="5">:</td>
                    <td width="300">
                    @if($signatures)
                        {{ $signatures->hp }}
                    @else
                        <p class="merah"></p>
                    @endif
                </td>
                </tr>
            </table><br>
            <br>  
    </div>
    <script type="text/javascript">
        window.print();

    // Ambil ID dari elemen tanda tangan
    var tandaTanganProd = document.getElementById('ttdprodusen');
    var tandaTanganWal = document.getElementById('ttdwalidata');
    // Ganti src elemen img dengan URL gambar tanda tangan yang disimpan
    tandaTanganProd.src = 'path/to/signed_image.png'; // Ganti dengan path yang sesuai dengan lokasi penyimpanan tanda tangan
    tandaTanganWal.src = 'path/to/signed_image.png';
    </script>
</body>
</html>
