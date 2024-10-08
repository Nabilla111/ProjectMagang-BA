@extends('layouts.app')

@section('contents')
<div class="container d-flex justifiy-content-center pt-8">
    <div class="col-md-11">
        <h2 class="text-center pb-2 text-secondary">Edit Berita Acara Geospasial</h2>       
        <hr/>
        <form action="{{route('bageo.updateStep4', $bageo->id)}}" method="POST">
        @csrf
        @method('PUT') <!-- Menggunakan method PUT untuk update data -->

        <table class="table table-bordered">
            <tr>
                <th>Kode Unsur</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="kode_unsur" class="form-control" value="{{ $informasiKugi->kode_unsur ?? '' }}" placeholder="Kode Unsur">
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Nama Unsur</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="nama_unsur" class="form-control" value="{{ $informasiKugi->nama_unsur ?? '' }}" placeholder="Nama Unsur">
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Nama Alias</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="nama_alias" class="form-control" value="{{ $informasiKugi->nama_alias ?? '' }}" placeholder="Nama Alias">
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
                        <option value="titik" {{ $informasiKugi->fitur == 'titik' ? 'selected' : '' }}>Titik</option>
                        <option value="garis" {{ $informasiKugi->fitur == 'garis' ? 'selected' : '' }}>Garis</option>
                        <option value="area" {{ $informasiKugi->fitur == 'area' ? 'selected' : '' }}>Area</option>
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
                        <option value="shp" {{ $informasiKugi->format_data == 'shp' ? 'selected' : '' }}>Shapefile</option>
                        <option value="gdb" {{ $informasiKugi->format_data == 'gdb' ? 'selected' : '' }}>Geodatabase</option>
                        <option value="tiff" {{ $informasiKugi->format_data == 'tiff' ? 'selected' : '' }}>Tiff</option>
                        <option value="jpg" {{ $informasiKugi->format_data == 'jpg' ? 'selected' : '' }}>Jpg</option>
                        <option value="tabel" {{ $informasiKugi->format_data == 'tabel' ? 'selected' : '' }}>Tabel</option>
                        <option value="lainnya" {{ $informasiKugi->format_data == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
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
                    <input type="text" name="SRSCRS" class="form-control" value="{{ $informasiKugi->SRSCRS }}" placeholder="Isi SRS / CRS">
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Skala</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="skala" class="form-control" value="{{ $informasiKugi->skala }}" placeholder="Isi Skala">
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
                        <option value="sesuai" {{ $informasiKugi->atribut == 'sesuai' ? 'selected' : '' }}>Sesuai</option>
                        <option value="tidaksesuai" {{ $informasiKugi->atribut == 'tidaksesuai' ? 'selected' : '' }}>Tidak Sesuai</option>
                        <option value="tidakada" {{ $informasiKugi->atribut == 'tidakada' ? 'selected' : '' }}>Tidak Ada</option>
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
                    <input type="text" name="catatan" class="form-control" value="{{ $informasiKugi->catatan }}" placeholder="Catatan">
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Saran</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="saran" class="form-control" value="{{ $informasiKugi->saran }}" placeholder="Saran">
                </td>
            </tr>
        </table>

        <td>
            <button type="submit" class="btn btn-primary">Next</button>
            <a href="{{route('bageo.editStep3', $bageo->id)}}" type="button" class="btn btn-secondary">Kembali</a>
        </td>

        </form>
    </div>
</div>
@endsection