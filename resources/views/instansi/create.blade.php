@extends('layouts.app')


@section('contents')
<h1 class="mb-0">Tambah Instansi</h1>
        <hr/>
        <form action="{{route('instansi.store')}}" method="POST">
            @csrf
        <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Nama Instansi</label>
            <div class="col sm-9">
            <input type="text" name="nama_instansi" class="form-control" placeholder="Nama Instansi">
        </div>
</div>
<div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Alamat</label>
            <div class="col sm-9">
            <textarea class="form-control" name="alamat" placeholder="Alamat" rows="2"></textarea>
        </div>
</div>
<div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Telepon</label>
            <div class="col sm-9">
            <input type="text" name="telepon" class="form-control" placeholder="Telepon">
        </div>
</div>
        <div class="mb-3 row">
            <label for="ba" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{route('instansi')}}" type="button" class="btn btn-secondary">Kembali</a>
        </div>
        </div>
</form>
@endsection