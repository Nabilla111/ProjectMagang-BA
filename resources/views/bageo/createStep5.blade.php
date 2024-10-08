@extends('layouts.app')


@section('contents')
<div class="container d-flex justifiy-content-center pt-8">
    <div class="col-md-11">
        <h2 class="text-center pb-2 text-secondary">Tambah Berita Acara Geospasial</h2>       
        <hr/>
        <form action="{{route('bageo.postStep5')}}" method="POST">
        @csrf

<table class="table table-bordered">
    <tr>
        <th>Nama</th>
</tr>
<tr>
<td>
<input type="text" name="nama" class="form-control" placeholder="Nama">
</td>
</tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>Format Data</th>
</tr>
<tr>
<td>
<input type="text" name="format_data" class="form-control" placeholder="Format Data">
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

<table class="table table-bordered">
    <tr>
        <th>Kelengkapan Dataset</th>
    </tr>
    <tr>
        <td>
            <select name="kelengkapan_dataset" id="yearSelector" class="form-control">
            <option value="">-Pilih-</option>
                <option value="terima">Diterima</option>
                <option value="tolak">Ditolak</option>
            </select>
        </td>
    </tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>Konsistensi Logis</th>
    </tr>
    <tr>
        <td>
            <select name="konsistensi_logis" id="yearSelector" class="form-control">
            <option value="">-Pilih-</option>
                <option value="terima">Diterima</option>
                <option value="tolak">Ditolak</option>
            </select>
        </td>
    </tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>Akurasi Posisi</th>
    </tr>
    <tr>
        <td>
            <select name="akurasi_posisi" id="yearSelector" class="form-control">
            <option value="">-Pilih-</option>
                <option value="terima">Diterima</option>
                <option value="tolak">Ditolak</option>
            </select>
        </td>
    </tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>Akurasi Tematik</th>
    </tr>
    <tr>
        <td>
            <select name="akurasi_tematik" id="yearSelector" class="form-control">
            <option value="">-Pilih-</option>
                <option value="terima">Diterima</option>
                <option value="tolak">Ditolak</option>
            </select>
        </td>
    </tr>
</table>

<table class="table table-bordered">
    <tr>
        <th>Akurasi Temporal</th>
    </tr>
    <tr>
        <td>
            <select name="akurasi_temporal" id="yearSelector" class="form-control">
            <option value="">-Pilih-</option>
                <option value="terima">Diterima</option>
                <option value="tolak">Ditolak</option>
            </select>
        </td>
    </tr>
</table>

<td>
            <button type="submit" class="btn btn-primary ">Review</button>
            <a href="{{route('bageo.createStep4')}}" type="button" class="btn btn-secondary">Kembali</a>
            </td>

</form>
@endsection