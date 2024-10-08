@extends('layouts.app')

@section('contents')
<div class="container d-flex justifiy-content-center pt-8">
    <div class="col-md-11">
        <h2 class="text-center pb-2 text-secondary">Edit Berita Acara Geospasial</h2>       
        <hr/>
        <form action="{{ route('bageo.updateStep3', $bageo->id) }}" method="POST">
        @csrf
        @method('PUT') <!-- Menggunakan method PUT untuk update data -->

        <table class="table table-bordered">
            <tr>
                <th>Bentuk</th>
            </tr>
            <tr>
                <td>
                    <select name="bentuk" id="yearSelector" class="form-control">
                        <option value="">-Pilih Bentuk-</option>
                        <option value="kerangka" {{ $standardataGeo && $standardataGeo->bentuk == 'kerangka' ? 'selected' : '' }}>Kerangka Acuan</option>
                    <option value="produk_data" {{ $standardataGeo && $standardataGeo->bentuk == 'produk_data' ? 'selected' : '' }}>Spesifikasi Produk Data</option>
                    <option value="teknis_lainnya" {{ $standardataGeo && $standardataGeo->bentuk == 'teknis_lainnya' ? 'selected' : '' }}>Spesifikasi Teknis Lainnya</option>
                    <option value="belum_ada" {{ $standardataGeo && $standardataGeo->bentuk == 'belum_ada' ? 'selected' : '' }}>Belum Ada</option>
                    </select>
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Nomor</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="nomor" class="form-control" value="{{ $standardataGeo ? $standardataGeo->nomor : '' }}" placeholder="Nomor">
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Tanggal</th>
            </tr>
            <tr>
                <td>
                    <input type="date" name="tanggal" class="form-control" value="{{ $standardataGeo && $standardataGeo->tanggal ? $standardataGeo->tanggal->format('Y-m-d') : '' }}" placeholder="Tanggal">
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Konsep</th>
            </tr>
            <tr>
                <td>
                <input type="text" name="konsep" class="form-control" value="{{ $standardataGeo ? $standardataGeo->konsep : '' }}" placeholder="Konsep">
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Definisi</th>
            </tr>
            <tr>
                <td>
                <input type="text" name="definisi" class="form-control" value="{{ $standardataGeo ? $standardataGeo->definisi : '' }}" placeholder="Definisi">
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Klasifikasi</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="klasifikasi" class="form-control" value="{{ $standardataGeo ? $standardataGeo->klasifikasi : '' }}" placeholder="Klasifikasi">
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Ukuran</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="ukuran" class="form-control" value="{{ $standardataGeo ? $standardataGeo->ukuran : '' }}" placeholder="Ukuran">
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Satuan</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="satuan" class="form-control" value="{{ $standardataGeo ? $standardataGeo->satuan : '' }}" placeholder="Satuan">
                </td>
            </tr>
        </table>

        <td>
            <button type="submit" class="btn btn-primary">Next</button>
            <a href="{{route('bageo.editStep2', $bageo->id)}}" type="button" class="btn btn-secondary">Kembali</a>
        </td>

        </form>
    </div>
</div>
@endsection
