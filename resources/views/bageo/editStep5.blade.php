@extends('layouts.app')

@section('contents')
<div class="container d-flex justifiy-content-center pt-8">
    <div class="col-md-11">
        <h2 class="text-center pb-2 text-secondary">Edit Berita Acara Geospasial</h2>       
        <hr/>
        <form action="{{route('bageo.updateStep5', $bageo->id)}}" method="POST">
        @csrf
        @method('PUT') <!-- Menggunakan method PUT untuk update data -->

        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="nama" class="form-control" value="{{ $metadataGeo->nama ?? '' }}" placeholder="Nama">
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Format Data</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="format_data" class="form-control" value="{{ $metadataGeo->format_data ?? '' }}" placeholder="Format Data">
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Catatan</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="catatan" class="form-control" value="{{ $metadataGeo->catatan ?? '' }}" placeholder="Catatan">
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Saran</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="saran" class="form-control" value="{{ $metadataGeo->saran ?? '' }}" placeholder="Saran">
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
                        <option value="terima" {{ $penjaminanKualitas->kelengkapan_dataset == 'terima' ? 'selected' : '' }}>Diterima</option>
                        <option value="tolak" {{ $penjaminanKualitas->kelengkapan_dataset == 'tolak' ? 'selected' : '' }}>Ditolak</option>
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
                        <option value="terima" {{ $penjaminanKualitas->konsistensi_logis == 'terima' ? 'selected' : '' }}>Diterima</option>
                        <option value="tolak" {{ $penjaminanKualitas->konsistensi_logis == 'tolak' ? 'selected' : '' }}>Ditolak</option>
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
                        <option value="terima" {{ $penjaminanKualitas->akurasi_posisi == 'terima' ? 'selected' : '' }}>Diterima</option>
                        <option value="tolak" {{ $penjaminanKualitas->akurasi_posisi == 'tolak' ? 'selected' : '' }}>Ditolak</option>
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
                        <option value="terima" {{ $penjaminanKualitas->akurasi_tematik == 'terima' ? 'selected' : '' }}>Diterima</option>
                            <option value="tolak" {{ $penjaminanKualitas->akurasi_tematik == 'tolak' ? 'selected' : '' }}>Ditolak</option>
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
                        <option value="terima" {{ $penjaminanKualitas->akurasi_temporal == 'terima' ? 'selected' : '' }}>Diterima</option>
                            <option value="tolak" {{ $penjaminanKualitas->akurasi_temporal == 'tolak' ? 'selected' : '' }}>Ditolak</option>
                    </select>
                </td>
            </tr>
        </table>

        <td>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('bageo.editStep4', $bageo->id)}}" type="button" class="btn btn-secondary">Kembali</a>
        </td>

        </form>
    </div>
</div>
@endsection