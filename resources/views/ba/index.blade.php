@extends('layouts.app')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Daftar Berita Acara Statistik</h1>
    <a href="{{ route('ba.create') }}" class="btn btn-primary">+ Tambah Berita Acara</a>
</div>
<hr/>

@if(Session::has('success'))
<div class="alert alert-success" role="alert">
    {{ Session::get('success') }}
</div>
@endif 

<div class="my-3">
    <form action="{{ route('ba') }}" method="GET">
        <input type="text" name="keyword" value="{{ $keyword ?? '' }}" placeholder="Masukkan kata kunci">
        <button type="submit" class="btn btn-primary">Cari</button>
        <a href="{{ route('ba') }}" type="button" class="btn btn-danger">Reset</a>
    </form>
</div>

<table class="table table-hover">
    <thead class="table-primary">
        <tr>
            <th width="10">#</th>
            <th width="150">Perihal BA</th>
            <th width="350">Instansi</th>
            <th width="220">Tanggal BA</th>
            <th width="10">Tahun</th>
            <th width="100">Action</th>
        </tr>
    </thead>
    <tbody>
        @if($bas->count() > 0)
        @foreach($bas as $ba)
        <tr>
            <input type="hidden" class="delete_id" value="{{ $ba->id }}">
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $ba->jenis_ba }}</td>
            <td class="align-middle">{{ $ba->instansi }}</td>
            <td class="align-middle">{{ \Carbon\Carbon::parse($ba->tanggal_ba)->translatedFormat('l, d F Y') }}</td>
            <td class="align-middle">{{ $ba->tahun }}</td>
            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('ba.edit', $ba->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('ba.show', $ba->id) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i> View
                    </a>
                    <form action ="{{ route('ba.destroy', $ba->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                    <a href="{{ route('ba.cetak', $ba->id) }}" target="_blank" class="btn btn-success btn-sm">
                        <i class="fas fa-print"></i> Cetak
                    </a>
                </div>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td class="text-center" colspan="5">Berita Acara Belum Ada</td>
        </tr>
        @endif
    </tbody>
</table>
<div class="my-3 d-flex justify-content-end">
    {{ $bas->links() }}
</div>
@endsection
