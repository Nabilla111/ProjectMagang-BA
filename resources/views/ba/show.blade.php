@extends('layouts.app')
  
  
@section('contents')
<!DOCTYPE html>
<html>
<head>
    <title> Cetak Berita Acara </title>
</head>
<style>
    .text-blue {
    color: blue;
}
    </style>
<table width="1000" align="center">
    <tr>  
    <td><center><img src="{{URL('image/pemprov-jateng.png')}}" alt="" width="100" height="100"></td></center>
      <td><center> 
                <font size ="5"><b>PEMERINTAH PROVINSI JAWA TENGAH</b></font><br>
                <font size ="6"><b>DINAS KOMUNIKASI DAN INFORMATIKA</b></font><br>
                <font size ="2">Jl. Menteri Supeno I Semarang, Mugassari, Kec. Semarang Sel., Kota Semarang, Jawa Tengah 50243</font><br>
                <font size ="2">Surat Elektronik : diskominfo@jatengprov.go.id ; Website : http://diskominfo.jatengprov.go.id</font></center>
      </td>
</tr>
<tr>
    <td colspan="2"><hr size="4px" color="black"></td>
</tr>
</table>
<tr>
<table width="1000" align="center">
      <td><center> 
                <font size ="5"><b>BERITA ACARA</b></font><br>
                <font size ="5"><b><?php $bas_new=strtoupper("$bas->jenis_ba"); echo $bas_new?></b></font><br>
                <font size ="5"><b>TAHUN <?php echo date("Y")?></b></font></center>
      </td>
</tr>
</table>
<table width="1000"  align="center">
<tr>
<td height="30" colspan="2"></td>
</tr>

<td colspan="2" algin="justify"><font size="4">Telah dilaksanakan <?php echo "$bas->jenis_ba"?> Tahun <b> <?php echo "$bas->tahun"?> </b> pada <b><?php echo "$bas->instansi"?></b>
hari <b><?php echo (\Carbon\Carbon::parse($bas->tanggal_ba)->translatedFormat('l'))?></b>
tanggal <b><?php echo (\Carbon\Carbon::parse($bas->tanggal_ba)->translatedFormat('d'))?></b>
bulan <b><?php echo (\Carbon\Carbon::parse($bas->tanggal_ba)->translatedFormat('F'))?></b>
Tahun <b><?php echo (\Carbon\Carbon::parse($bas->tanggal_ba)->translatedFormat('Y'))?></b> melalui Portal Satu Data Jawa Tengah. Adapun Judul Data sebagai berikut :<p>
</font>
<p class="justify"><font size="4">
    <table  align="center">
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
         </font>
</tbody>

<!-- tindaklanjut -->
@if($juldabelums->isNotEmpty())
<td height="20"></td>
</table>
<p class="justify"><font size="4">Tindaklanjut <?php echo "$bas->jenis_ba"?> adalah sebagai berikut : <p>
</font>
<p class="justify"><font size="4">
<table  align="center">
<thead class="table-secondary">        
        <tr>
            <th width="50">No</th>
            <th width="800">Judul Data</th>
            <th width="150">Tahun</th>
        </tr>
</thead>
</font>
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
                <td class="text-center"colspan="5">-tidak ada tindaklanjut-</td>
                <td height="30"></td>
            </tr>
        @endif
</tbody>
@endif

<!-- format data -->
@if($kesepakatans->isNotEmpty())  
<td height="20"></td>
</table> 
<p class="justify"><font size="4">Hasil <?php echo "$bas->jenis_ba"?> adalah sebagai berikut : <p>
</font>
<p class="justify"><font size="4">
<table  align="center">
<thead class="table-secondary">        
        <tr>
            <th width="50">No</th>
            <th width="800">Nama Kolom</th>
            <th width="150">Tipe Data</th>
        </tr>
</thead>
</font>
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
                <td class="text-center"colspan="5">-tidak ada hasil kesepakatan format data-</td>
                <td height="30"></td>
            </tr>
        @endif
        </tbody>
        @endif

        <!-- keterangan -->
<td height="20"></td>
</table>
@if($juldabelums->isNotEmpty())
<font size="4">Jika ada Judul Data yang belum dipenuhi oleh <b><?php echo "$bas->instansi"?></b> sesuai 
    dengan tabel kesepakatan tindaklanjut di atas, dimohon untuk dipenuhi maksimal pada Hari <b><?php echo \Carbon\Carbon::parse($bas->tanggal_ba)->addWeek()->translatedFormat('l')?></b> 
    tanggal <b><?php echo \Carbon\Carbon::parse($bas->tanggal_ba)->addWeek()->translatedFormat('d F Y') ?></b>.
    <p class="justify"><font size="4"><br>Demikian Berita Acara ini disusun dan disepakati oleh Walidata Daerah bersama <b><?php echo "$bas->instansi"?></b> sebagai Walidata Pendukung/Produsen Data.</p>
</font>
@endif
@if($kesepakatans->isNotEmpty())  
<p class="justify"><font size="4">Demikian Berita Acara ini disusun dan disepakati oleh Walidata Daerah bersama <b><?php echo "$bas->instansi"?></b> sebagai Walidata Pendukung/Produsen Data untuk ditindak lanjuti dengan membuat tabel di Portal Data Jawa Tengah sesuai kesepakatan format tabel di atas paling lambat <b><?php echo $bulandepan->translatedFormat(' d F Y') ?> </b>.<p>
</font>
@endif
<tr>
<td height="30"></td>
</tr>

<table width="1000" align="center">		
<tr>
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
		</tr>
	</table>
    <table width="1000" align="center">
        <tr>
            <td width="400" height="70">
                @if ($bas->signatureprodusens()->exists())
                    <span style="color: blue;">Produsen sudah melakukan tanda tangan</span>
                @else
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ttdprod">
                        Tanda Tangan Produsen
                    </button>
                @endif
            </td>
            <td width="200"></td>
            <td width="400">
                @if ($bas->signatures()->exists())
                    <span style="color: blue;">Walidata sudah melakukan tanda tangan</span>
                @else
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#ttdwali">
                        Tanda Tangan Walidata
                    </button>
                @endif
            </td>
        </tr>
    </table>
    
    <table width="1000" align="center">

    <tr>
        	<td width="95">Nama</td>
            <td width="5">:</td>
			<td width="300"></td>
            <td width="200"></td>
            <td width="95">Nama</td>
            <td width="5">:</td>
            <td width="300"></td>
  		</tr>
  		<tr>
            <td width="95">NIP</td>
            <td width="5">:</td>
			<td width="300"></td>
            <td width="200"></td>
            <td width="95">NIP</td>
            <td width="5">:</td>
            <td width="300"></td>
		</tr>
  		<tr>
            <td width="95">No. HP</td>
            <td width="5">:</td>
			<td width="300"></td>
            <td width="200"></td>
            <td width="95">No.HP</td>
            <td width="5">:</td>
            <td width="300"></td>
		</tr>
	</table><br>
    <br>  
    <table align="right">
        <td><a href="{{route('ba')}}" type="button" class="btn btn-primary">Kembali</a>
        <!-- Tombol atau tautan cetak -->
        <a href="{{route('ba.cetak', $bas->id)}}" target="_blank" type="button" class="btn btn-success">Cetak BA <i class="fas fa-print"></i></a>
        </td> 
    </table>
</html>
@endsection
@include('ba.signature')
@include('ba.signatureprodusen')