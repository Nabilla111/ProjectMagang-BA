@extends('layouts.app')

@section('contents')
<div class="container d-flex justify-content-center pt-8">
    <div class="col-md-11">
        <h2 class="text-center pb-2 text-secondary">Edit Berita Acara Geospasial</h2>       
        <hr/>
        <form action="{{ route('bageo.updateStep1', $data->id) }}" method="POST">
        @csrf
        @method('POST') <!-- Use POST method -->

        <table class="table table-bordered">
            <tr>
                <th>Berita Acara di tandatangani oleh</th>
            </tr>
            <tr>
                <td>
                    <select name="id_ttd" id="ttd" class="form-control" required>
                        <option value="">-Pilih Penandatangan-</option>
                        @foreach($ttdList as $ttd)
                            <option value="{{ $ttd->id }}" {{ $ttd->id == $data->id_ttd ? 'selected' : '' }}>
                                {{ $ttd->nama }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Perihal Berita Acara</th>
            </tr>
            <tr>
                <td>
                    <select name="jenis_ba" id="jenisba" class="form-control" required>
                        <option value="">-Pilih Perihal BA-</option>
                        @foreach($jenisBaList as $jenisBa)
                            <option value="{{ $jenisBa->jenisba }}" {{ $jenisBa->jenisba == $data->jenis_ba ? 'selected' : '' }}>
                                {{ $jenisBa->jenisba }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Instansi</th>
            </tr>
            <tr>
                <td>
                    <select name="instansi" id="nama_instansi" class="form-control" required>
                        <option value="">-Pilih Instansi-</option>
                        @foreach($instansiList as $instansi)
                            <option value="{{ $instansi->nama_instansi }}" {{ $instansi->nama_instansi == $data->instansi ? 'selected' : '' }}>
                                {{ $instansi->nama_instansi }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Tanggal</th>
            </tr>
            <tr>
                <td>
                    <input type="date" name="tanggal_bageo" class="form-control" value="{{ $data->tanggal_bageo }}" required>
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Tahun Data</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="tahun" class="form-control" value="{{ $data->tahun }}" required>
                </td>
            </tr>
        </table>

        <td>
            <button type="submit" class="btn btn-primary">Update</button>
        </td>
        </form>
    </div>
</div>
@endsection
