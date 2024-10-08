@extends('layouts.app')
@section('contents')

<div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Daftar Perihal Berita Acara</h1>
        <a href="{{route('jenisba.create')}}" class="btn btn-primary"> + Tambah Perihal BA</a>
</div>
<hr/>
<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Perihal Berita Acara</th>
            <th>Action</th>
        </tr>
    </thead>
    @if($jenisbas->count() > 0)
        @foreach($jenisbas as $jenisbas)
        <tr>
            <td class="align-middle">{{$loop->iteration}}</td>
            <td class="align-middle">{{$jenisbas->jenisba}}</td>
            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route('jenisba.edit', $jenisbas->id)}}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action ="{{route('jenisba.destroy', $jenisbas->id)}}" method="POST" onsubmit="return confirm('Delete?')">
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
                <td class="text-center"colspan="5">Perihal BA Belum Ada</td>
</tr>
        @endif
    </tbody>
</table>
@endsection