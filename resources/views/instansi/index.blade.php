@extends('layouts.app')


@section('contents')
<div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Daftar Instansi</h1>
        <a href="{{route('instansi.create')}}" class="btn btn-primary"> + Tambah Instansi</a>
</div>
<hr/>
<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Nama Instansi</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @if($instansis->count() > 0)
        @foreach($instansis as $instansis)
        <tr>
            <td class="align-middle">{{$loop->iteration}}</td>
            <td class="align-middle">{{$instansis->nama_instansi}}</td>
            <td class="align-middle">{{$instansis->alamat}}</td>
            <td class="align-middle">{{$instansis->telepon}}</td>
            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href={{route('instansi.edit', $instansis->id)}} class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{route('instansi.show', $instansis->id)}}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i> View
                    </a>
                    <form action ="{{route('instansi.destroy', $instansis->id)}}}" method="POST" onsubmit="return confirm('Delete?')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
        @else
            <tr>
                <td class="text-center"colspan="5">Instansi Belum Ada</td>
</tr>
        @endif
    </tbody>
</table>
@endsection