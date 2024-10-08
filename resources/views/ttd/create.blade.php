@extends('layouts.app')

@section('contents')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Upload Tanda Tangan</h2>

    <form action="{{ route('ttd.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Nama</label>
            <div class="col sm-9">
                <input type="text" name="nama" class="form-control" placeholder="Nama">
            </div>
</div>
<div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Jabatan</label>
            <div class="col sm-9">
            <input type="text" name="jabatan" class="form-control" placeholder="Jabatan">
        </div>
</div>
<div class="mb-3 row">
        <label class="col-sm-3 col-form-label">NIP</label>
            <div class="col sm-9">
            <input type="text" name="nip" class="form-control" placeholder="NIP">
        </div>
</div>
<div class="mb-3 row">
        <label class="col-sm-3 col-form-label">Upload Tanda Tangan</label>
            <div class="col sm-9">
            <input type="file" name="ttd" class="form-control" placeholder="filename">
        </div>
</div>
        <div class="mb-3 row">
            <label for="ba" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
            <button type="submit" class="btn btn-primary">Simpan</button>
            
        </div>
        </div>
</form>
@endsection