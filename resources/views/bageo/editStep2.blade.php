@extends('layouts.app')

@section('contents')
<div class="container d-flex justify-content-center pt-8">
    <div class="col-md-11">
        <h2 class="text-center pb-2 text-secondary">Edit Berita Acara Geospasial</h2>       
        <hr/>
        <form action="{{ route('bageo.updateStep2', $bageo->id) }}" method="POST">
            @csrf
            @method('PUT') 

            <table class="table table-bordered">
                <tr>
                    <th>Judul Data</th>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="judul_data" class="form-control" value="{{ $julda_geos->judul_data }}" placeholder="Judul Data">
                    </td>
                </tr>
            </table>

            <table class="table table-bordered">
                <tr>
                    <th>Waktu Unggah</th>
                </tr>
                <tr>
                    <td>
                    <input type="date" name="waktu_unggah" class="form-control" value="{{ $julda_geos->waktu_unggah }}" placeholder="Tanggal BA">
                    </td>
                </tr>
            </table>

            <table class="table table-bordered">
                <tr>
                    <th>Duplikasi</th>
                </tr>
                <tr>
                    <td>
                        <select name="duplikasi" id="yearSelector" class="form-control">
                            <option value="">-Pilih Jenis Duplikasi-</option>
                            <option value="ada" {{ $julda_geos->duplikasi == 'ada' ? 'selected' : '' }}>Ada Duplikasi</option>
                            <option value="tidak" {{ $julda_geos->duplikasi == 'tidak' ? 'selected' : '' }}>Tidak Ada Duplikasi</option>
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
                        @foreach($jenisDatas as $jenisdata)
                            <option value="{{ $jenisdata->jenisdata }}" {{ $julda_geos->jenis_data == $jenisdata->jenisdata ? 'selected' : '' }}>
                                {{ $jenisdata->jenisdata }}
                            </option>
                        @endforeach
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
                            <option value="pertama" {{ $julda_geos->periode == 'pertama' ? 'selected' : '' }}>Unggahan Pertama</option>
                            <option value="perbaikan" {{ $julda_geos->periode == 'perbaikan' ? 'selected' : '' }}>Perbaikan</option>
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
                        <input type="text" name="catatan" class="form-control" value="{{ $julda_geos->catatan }}" placeholder="Catatan">
                    </td>
                </tr>
            </table>

            <div>
                <button type="submit" class="btn btn-primary">Next</button>
                <a href="{{ route('bageo.editStep1', $bageo->id) }}" class="btn btn-secondary">Kembali</a>
            </div>

        </form>
    </div>
</div>
@endsection
