@extends('layouts.app')

@section('contents')
<div class="container d-flex justifiy-content-center pt-8">
    <div class="col-md-11">
        <h2 class="text-center pb-2 text-secondary">Edit Berita Acara Geospasial</h2>       
        <hr/>
        <form action="{{route('bageo.updateStep1', $bageo->id)}}" method="POST">
        @csrf
        @method('PUT')

        <table class="table table-bordered">
            <tr>
                <th>Berita Acara di tandatangani oleh</th>
            </tr>
            <tr>
                <td>
                    <select name="id_ttd" id="ttd" class="form-control" required>
                        <option value="">-Pilih Penandatangan-</option>
                        <?php
                            $con =mysqli_connect("localhost","root","","badesk");
                            $result=mysqli_query($con,"SELECT*From ttd_kabids order by nama asc") or die(mysqli_error($con));
                            while ($sql_ttd_kabids=mysqli_fetch_array($result)) {
                                $selected = $bageo->id_ttd == $sql_ttd_kabids['id'] ? 'selected' : '';
                                echo '<option value="'.$sql_ttd_kabids['id'].'" '.$selected.'>',
                                $sql_ttd_kabids['nama'].'</option>';
                            }
                        ?>
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
                        <?php
                            $con =mysqli_connect("localhost","root","","badesk");
                            $result=mysqli_query($con,"SELECT*From jenisbas order by jenisba asc") or die(mysqli_error($con));
                            while ($sql_jenisbas=mysqli_fetch_array($result)) {
                                $selected = $bageo->jenis_ba == $sql_jenisbas['jenisba'] ? 'selected' : '';
                                echo '<option value="'.$sql_jenisbas['jenisba'].'" '.$selected.'>',
                                $sql_jenisbas['jenisba'].'</option>';
                            }
                        ?>
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
                        <?php
                            $con =mysqli_connect("localhost","root","","badesk");
                            $sql_instansis=mysqli_query($con,"SELECT*From instansis order by nama_instansi asc") or die(mysqli_error($con));
                            while ($instansis=mysqli_fetch_array($sql_instansis)) {
                                $selected = $bageo->instansi == $instansis['nama_instansi'] ? 'selected' : '';
                                echo '<option value="'.$instansis['nama_instansi'].'" '.$selected.'>',
                                $instansis['nama_instansi'].'</option>';
                            }
                        ?>
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
                    <input type="date" name="tanggal_bageo" class="form-control" value="{{ $bageo->tanggal_bageo }}" placeholder="Tanggal BA">
                </td>
            </tr>
        </table>

        <table class="table table-bordered">
            <tr>
                <th>Tahun Data</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="tahun" class="form-control" value="{{ $bageo->tahun }}" placeholder="Tahun Data">
                </td>
            </tr>
        </table>

        <td>
            <button type="submit" class="btn btn-primary ">Next</button>
        </td>

        </form>
    </div>
</div>
@endsection
