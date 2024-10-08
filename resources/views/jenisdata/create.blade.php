@extends('layouts.app')


@section('contents')
<h1 class="mb-0">Tambah Jenis Data</h1>
        <hr/>
        <form action="{{route('jenisdata.store')}}" method="POST">
            @csrf
        <div class="mb-3 row">
        <label class="col-sm-3 col-form-label"> Jenis Data</label>
            <div class="col sm-9">
            <input type="text" name="jenisdata" class="form-control" placeholder="Isikan Jenis Data">
        </div>
</div>
        <div class="mb-3 row">
            <label for="ba" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('jenisdata')}}" type="button" class="btn btn-secondary">Kembali</a>
        </div>
        </div>
</form>
@endsection