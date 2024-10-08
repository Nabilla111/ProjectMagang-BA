@extends('layouts.app')


@section('contents')
<h1 class="mb-0">Edit Instansi</h1>
        <hr/>
        <form action="{{route('instansi.update',$instansis->id)}}" method="POST">
            @csrf
            @method('PUT')
        <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Nama Instansi</label>
            <div class="col sm-9">
            <input type="text" name="nama_instansi" class="form-control" value="{{$instansis->nama_instansi}}">
        </div>
</div>
<div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Telepon</label>
            <div class="col sm-9">
            <input type="text" name="alamat" class="form-control" value="{{$instansis->alamat}}">
        </div>
</div>
<div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Telepon</label>
            <div class="col sm-9">
            <input type="text" name="telepon" class="form-control" value="{{$instansis->telepon}}">
        </div>
</div>
        <div class="mb-3 row">
            <label for="ba" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
             <button type="submit" class="btn btn-primary">Update</button>
             <a href="{{route('instansi')}}" type="button" class="btn btn-secondary">Kembali</a>
        </div>
        </div>
</form>
@endsection