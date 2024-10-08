@extends('layouts.app')


@section('contents')
<div class="container d-flex justifiy-content-center pt-8">
    <div class="col-md-11">
        <h2 class="text-center pb-2 text-secondary">Tambah Berita Acara Geospasial</h2>       
        <hr/>
        <form action="{{route('bageo.postStep4')}}" method="POST">
        @csrf

<table class="table table-bordered">
    <tr>
        <th>Kode Unsur</th>
</tr>
<tr>
<td>
<input type="text" name="kode_unsur" class="form-control" placeholder="Kode Unsur">
</td>
</tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>Nama Unsur</th>
</tr>
<tr>
<td>
<input type="text" name="nama_unsur" class="form-control" placeholder="Nama Unsur">
</td>
</tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>Nama Alias</th>
</tr>
<tr>
<td>
<input type="text" name="nama_alias" class="form-control" placeholder="Nama Alias">
</td>
</tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>Fitur</th>
    </tr>
    <tr>
        <td>
            <select name="fitur" id="yearSelector" class="form-control">
            <option value="">-Pilih Fitur-</option>
                <option value="titik">Titik</option>
                <option value="garis">Garis</option>
                <option value="area">Area</option>
            </select>
        </td>
    </tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>Format Data</th>
    </tr>
    <tr>
        <td>
            <select name="format_data" id="yearSelector" class="form-control">
            <option value="">-Pilih Format Data-</option>
                <option value="shp">Shapefile</option>
                <option value="gdb">Geodatabase</option>
                <option value="tiff">Tiff</option>
                <option value="jpg">Jpg</option>
                <option value="tabel">Tabel</option>
                <option value="lainnya">Lainnya</option>
            </select>
        </td>
    </tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>SRS/CRS</th>
</tr>
<tr>
<td>
<input type="text" name="SRSCRS" class="form-control" placeholder="Isi SRC / CRS">
</td>
</tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>Skala</th>
</tr>
<tr>
<td>
<input type="text" name="skala" class="form-control" placeholder="Isi Skala">
</td>
</tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>Atribut</th>
    </tr>
    <tr>
        <td>
            <select name="atribut" id="yearSelector" class="form-control">
            <option value="">-Pilih Atribut-</option>
                <option value="sesuai">Sesuai</option>
                <option value="tidaksesuai">Tidak Sesuai</option>
                <option value="tidakada">Tidak Ada</option>
            </select>
        </td>
    </tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>Catatan</th>
</tr>
<tr>
<td>
<input type="text" name="catatan" class="form-control" placeholder="Catatan">
</td>
</tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>Saran</th>
</tr>
<tr>
<td>
<input type="text" name="saran" class="form-control" placeholder="Saran">
</td>
</tr>
</table>

<td>
            <button type="submit" class="btn btn-primary ">Next</button>
            <a href="{{route('bageo.createStep3')}}" type="button" class="btn btn-secondary">Kembali</a>
            </td>

</form>
@endsection