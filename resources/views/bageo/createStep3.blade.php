@extends('layouts.app')


@section('contents')
<div class="container d-flex justifiy-content-center pt-8">
    <div class="col-md-11">
        <h2 class="text-center pb-2 text-secondary">Tambah Berita Acara Geospasial</h2>       
        <hr/>
        <form action="{{route('bageo.postStep3')}}" method="POST">
        @csrf

        <table class="table table-bordered">
    <tr>
        <th>Bentuk</th>
    </tr>
    <tr>
        <td>
            <select name="bentuk" id="yearSelector" class="form-control">
            <option value="">-Pilih Bentuk-</option>
                <option value="kerangka">Kerangka Acuan</option>
                <option value="produk_data">Spesifikasi Produk Data</option>
                <option value="teknis_lainnya">Spesifikasi Teknis Lainnya</option>
                <option value="belum_ada">Belum Ada</option>
            </select>
        </td>
    </tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>Nomor</th>
</tr>
<td>
<input type="text" name="nomor" class="form-control" placeholder="Nomor">
</td>
</table>

<table class="table table-bordered">
    <tr>
        <th>Tanggal</th>
</tr>
<td>
<input type="date" name="tanggal" class="form-control" placeholder="Tanggal">
</td>
</table>

<table class="table table-bordered">
    <tr>
        <th>Konsep</th>
</tr>
<td>
<input type="text" name="konsep" class="form-control" placeholder="konsep">
</td>
</table>

<table class="table table-bordered">
    <tr>
        <th>Definisi</th>
</tr>
<td>
<input type="text" name="definisi" class="form-control" placeholder="definisi">
</td>
</table>

<table class="table table-bordered">
    <tr>
        <th>Klasifikasi</th>
</tr>
<td>
<input type="text" name="klasifikasi" class="form-control" placeholder="Klasifikasi">
</td>
</table>

<table class="table table-bordered">
    <tr>
        <th>Ukuran</th>
</tr>
<td>
<input type="text" name="ukuran" class="form-control" placeholder="Ukuran">
</td>
</table>

<table class="table table-bordered">
    <tr>
        <th>Satuan</th>
</tr>
<td>
<input type="text" name="satuan" class="form-control" placeholder="Satuan">
</td>
</table>

<td>
            <button type="submit" class="btn btn-primary ">Next</button>
            <a href="{{route('bageo.createStep2')}}" type="button" class="btn btn-secondary">Kembali</a>
            </td>

</form>
@endsection