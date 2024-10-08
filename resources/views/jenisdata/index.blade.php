@extends('layouts.app')
@section('contents')

<div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">Daftar Jenis Data</h1>
        <a href="{{route('jenisdata.create')}}" class="btn btn-primary"> + Tambah Jenis Data</a>
</div>
<hr/>
<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th>#</th>
            <th>Jenis Data</th>
            <th>Action</th>
        </tr>
    </thead>
    @if($jenisdatas->count() > 0)
        @foreach($jenisdatas as $jenisdatas)
        <tr>
            <td class="align-middle">{{$loop->iteration}}</td>
            <td class="align-middle">{{$jenisdatas->jenisdata}}</td>
            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{route('jenisdata.edit', $jenisdatas->id)}}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <form action ="{{route('jenisdata.destroy', $jenisdatas->id)}}" method="POST" onsubmit="return confirm('Delete?')">
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
                <td class="text-center"colspan="5">Jenis Data Belum Ada</td>
</tr>
        @endif
    </tbody>
</table>
@endsection