@extends('layouts.app')

@section('contents')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Edit Tanda Tangan</h2>

    <form action="{{ route('ttd.update',$ttd_kabids->id) }}" method="POST" enctype="multipart/form-data">
        @csrf 
@method('PUT')
        <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Nama</label>
            <div class="col sm-9">
                <input type="text" name="nama" class="form-control" value="{{$ttd_kabids->nama}}">
            </div>
</div>
<div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Jabatan</label>
            <div class="col sm-9">
            <input type="text" name="jabatan" class="form-control" value="{{$ttd_kabids->jabatan}}">
        </div>
</div>
<div class="mb-3 row">
        <label class="col-sm-3 col-form-label">NIP</label>
            <div class="col sm-9">
            <input type="text" name="nip" class="form-control" value="{{$ttd_kabids->nip}}">
        </div>
</div>
<div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Upload Tanda Tangan</label>
            <div class="col sm-9">
            <input type="file" name="ttd" class="form-control" value="{{$ttd_kabids->ttd}}">
        </div>
</div>
<div class="mb-3 row">
            <label for="ba" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
             <button type="submit" class="btn btn-primary">Update</button>
             <a href="{{route('ttd.index')}}" type="button" class="btn btn-secondary">Kembali</a>
        </div>
        </div>
</form>
@endsection