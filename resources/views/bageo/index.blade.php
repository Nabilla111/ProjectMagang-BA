@extends('layouts.app')

@section('contents')
<div class="d-flex align-items-center justify-content-between">
    <h1 class="mb-0">Daftar Berita Acara Geospasial</h1>
    <a href="{{ route('bageo.createStep1') }}" class="btn btn-primary">+ Tambah Berita Acara</a>
</div>
<hr/>

@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
    {{ Session::get('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif 

<div class="my-3">
    <form action="{{ route('bageo') }}" method="GET">
        <input type="text" name="keyword" value="{{ $keyword ?? '' }}" placeholder="Masukkan kata kunci">
        <button type="submit" class="btn btn-primary">Cari</button>
        <a href="{{ route('bageo') }}" type="button" class="btn btn-danger">Reset</a>
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
        @if($bageos->count() > 0)
        @foreach($bageos as $bageo)
        <tr>
            <input type="hidden" class="delete_id" value="{{ $bageo->id }}">
            <td class="align-middle">{{ $loop->iteration }}</td>
            <td class="align-middle">{{ $bageo->jenis_ba }}</td>
            <td class="align-middle">{{ $bageo->instansi }}</td>
            <td class="align-middle">{{ \Carbon\Carbon::parse($bageo->tanggal_bageo)->translatedFormat('l, d F Y') }}</td>
            <td class="align-middle">{{ $bageo->tahun }}</td>
            <td class="align-middle">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="{{ route('bageo.edit', $bageo->id) }}" class="btn btn-warning btn-sm">
                        <i class="fas fa-edit"></i> Edit
                    </a>
                    <a href="{{ route('bageo.show', $bageo->id) }}" class="btn btn-info btn-sm">
                        <i class="fas fa-eye"></i> View
                    </a>
                    <form action ="{{ route('bageo.destroy', $bageo->id) }}" method="POST" onsubmit="return confirm('Delete?')">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                    <a href="{{ route('bageo.cetak', $bageo->id) }}" target="_blank" class="btn btn-success btn-sm">
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

@endsection

@section('scripts')
<script>
    // Script untuk menutup alert setelah beberapa detik
    window.onload = function() {
        const alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(() => {
                alert.classList.remove('show');
                alert.classList.add('fade');
            }, 3000); // Menghilangkan alert setelah 3 detik
        }
    };
</script>
@endsection
