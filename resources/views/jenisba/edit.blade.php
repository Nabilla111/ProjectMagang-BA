@extends('layouts.app')


@section('contents')
<h1 class="mb-0">Edit Perihal Berita Acara</h1>
        <hr/>
        <form action="{{route('jenisba.update',$jenisbas->id)}}" method="POST">
            @csrf
            @method('PUT')
        <div class="mb-3 row">
        <label class="col-sm-3 col-form-label"> Jenis Berita Acara</label>
            <div class="col sm-9">
            <input type="text" name="jenisba" class="form-control" value="{{$jenisbas->jenisba}}">
        </div>
</div>
        <div class="mb-3 row">
            <label for="ba" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-9">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{route('jenisba')}}" type="button" class="btn btn-secondary">Kembali</a>
        </div>
        </div>
</form>
@endsection