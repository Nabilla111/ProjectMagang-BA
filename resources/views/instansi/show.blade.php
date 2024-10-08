@extends('layouts.app')


@section('contents')
<h1 class="mb-0">Detail Instansi</h1>
        <hr/>
        <form action="{{route('instansi.update',$instansis->id)}}" method="POST">
            @csrf
            @method('PUT')
        <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Nama Instansi</label>
            <div class="col sm-9">
            <input type="text" name="nama_instansi" class="form-control" value="{{$instansis->nama_instansi}}" readonly>
        </div>
</div>
        <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Alamat</label>
            <div class="col sm-9">
            <input type="text" name="alamat" class="form-control" value="{{$instansis->alamat}}" readonly>
        </div>
</div>
<div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Telepon</label>
            <div class="col sm-9">
            <input type="text" name="telepon" class="form-control" value="{{$instansis->telepon}}" readonly>
        </div>
</div>
 <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Created at</label>
            <div class="col sm-9">
            <input type="text" name="created_at" class="form-control" value="{{$instansis->created_at}}" readonly>
        </div>
</div>
<div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Updated at</label>
            <div class="col sm-9">
            <input type="text" name="updated_at" class="form-control" value="{{$instansis->updated_at}}" readonly>
        </div>
</div>
        <div class="mb-3 row">
            <label for="ba" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
             <a href="{{route('instansi')}}" type="button" class="btn btn-secondary">Kembali</a>
        </div>
        </div>
</form>
@endsection