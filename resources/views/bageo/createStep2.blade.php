@extends('layouts.app')


@section('contents')
<div class="container d-flex justifiy-content-center pt-8">
    <div class="col-md-11">
        <h2 class="text-center pb-2 text-secondary">Tambah Berita Acara Geospasial</h2>       
        <hr/>
        <form action="{{route('bageo.postStep2')}}" method="POST">
        @csrf

<table class="table table-bordered">
    <tr>
        <th>Judul Data</th>
</tr>
<td>
<input type="text" name="judul_data" class="form-control" placeholder="Judul Data">
</td>
</table>

<table class="table table-bordered">
    <tr>
        <th>Waktu Unggah</th>
</tr>
<td>
<input type="date" name="waktu_unggah" class="form-control" placeholder="Tanggal BA">
</td>
</table>

<table class="table table-bordered">
    <tr>
        <th>Duplikasi</th>
    </tr>
    <tr>
        <td>
            <select name="duplikasi" id="yearSelector" class="form-control">
            <option value="">-Pilih Jenis Duplikasi-</option>
                <option value="ada">Ada Duplikasi</option>
                <option value="tidak">Tidak Ada Duplikasi</option>
            </select>
        </td>
    </tr>
</table>

<table class="table table-bordered">
<tr>
        <th>Jenis Data</th>
</tr>
<tr>
<td>
<select name="jenis_data" id="jenisdata" class="form-control" required>
<option value="">-Pilih Jenis Data-</option>
<?php
            $con =mysqli_connect("localhost","root","","badesk");
            $sql_jenisdatas=mysqli_query($con,"SELECT*From jenisdatas order by jenisdata asc") or die
            (mysqli_eror($con));
            while ($jenisdatas=mysqli_fetch_array($sql_jenisdatas)) {
                echo '<option value="'.$jenisdatas['jenisdata'].'">',
                            $jenisdatas['jenisdata'].'</option>';
                    
            }?>
            </select>
        </td>
</tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>Periode</th>
    </tr>
    <tr>
        <td>
            <select name="periode" id="yearSelector" class="form-control">
            <option value="">-Pilih Periode-</option>
                <option value="pertama">Unggahan Pertama</option>
                <option value="perbaikan">Perbaikan</option>
            </select>
        </td>
    </tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>Catatan</th>
</tr>
<td>
<input type="text" name="catatan" class="form-control" placeholder="Catatan">
</td>
</table>

<td>
            <button type="submit" class="btn btn-primary ">Next</button>
            <a href="{{route('bageo.createStep1')}}" type="button" class="btn btn-secondary">Kembali</a>
            </td>

</form>
@endsection