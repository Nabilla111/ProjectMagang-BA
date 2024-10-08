@extends('layouts.app')

@section('contents')
<div class="container">
<div class="d-flex align-items-center justify-content-between">
<h2>Daftar Tanda Tangan</h2>
<a href="{{route('ttd.create')}}" class="btn btn-primary"> + Tambah Tanda Tangan</a>
</div>
<hr/>
    

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>NIP</th>
                <th>Tanda Tangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ttd_kabids as $ttd)
            <tr>
                <td class="align-middle">{{$loop->iteration}}</td>
                <td class="align-middle">{{ $ttd->nama }}</td>
                <td class="align-middle">{{ $ttd->jabatan }}</td>
                <td class="align-middle">{{ $ttd->nip }}</td>
                <td class="align-middle">{{ $ttd->ttd }}</td>

                <td class="align-middle">
                    <a href="{{ route('ttd.update', $ttd->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('ttd.destroy', $ttd->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
