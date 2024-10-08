@extends('layouts.app')

@section('contents')

<form action="{{ route('bageo.storeBageo') }}" method="POST">
        @csrf
<div class="container">
    <h2>Konfirmasi Data Berita Acara Geospasial</h2>

    <h4>Data Step 1</h4>

    <ul>
    <li>Tanda Tangan: 
        @php
            $ttd = \App\Models\TtdKabid::find($bageoDataStep1['id_ttd']);
        @endphp
        {{ $ttd ? $ttd->nama : '-' }}
    </li>
        <li>Jenis BA: {{ $bageoDataStep1['jenis_ba'] }}</li>
        <li>Instansi: {{ $bageoDataStep1['instansi'] }}</li>
        <li>Tanggal Berita Acara: {{ $bageoDataStep1['tanggal_bageo'] ? \Carbon\Carbon::parse($bageoDataStep1['tanggal_bageo'])->translatedFormat('d F Y') : '-' }}</li>
        <li>Tahun: {{ $bageoDataStep1['tahun'] }}</li>
    </ul>

    <h4>Data Step 2</h4>
    <ul>
        <li>Judul Data: {{ $bageoDataStep2['judul_data'] }}</li>
        <li>Waktu Unggah: {{ $bageoDataStep2['waktu_unggah'] ? \Carbon\Carbon::parse($bageoDataStep2['waktu_unggah'])->translatedFormat('d F Y') : '-' }}</li>
        <li>Duplikasi: {{ $bageoDataStep2['duplikasi'] }}</li>
        <li>Jenis Data: {{ $bageoDataStep2['jenis_data'] }}</li>
        <li>Periode: {{ $bageoDataStep2['periode'] }}</li>
        <li>Catatan: {{ $bageoDataStep2['catatan'] }}</li>
    </ul>

    <h4>Data Step 3</h4>
    <ul>
        <li>Bentuk: {{ $bageoDataStep3['bentuk'] }}</li>
        <li>Nomor: {{ $bageoDataStep3['nomor'] }}</li>
        <li>Tanggal: {{ $bageoDataStep3['tanggal'] }}</li>
        <li>Konsep: {{ $bageoDataStep3['konsep'] }}</li>
        <li>Definisi: {{ $bageoDataStep3['definisi'] }}</li>
        <li>Klasifikasi: {{ $bageoDataStep3['klasifikasi'] }}</li>
        <li>Ukuran: {{ $bageoDataStep3['ukuran'] }}</li>
        <li>Satuan: {{ $bageoDataStep3['satuan'] }}</li>
    </ul>

    <h4>Data Step 4</h4>
    <ul>
        <li>Kode Unsur: {{ $bageoDataStep4['kode_unsur'] }}</li>
        <li>Nama Unsur: {{ $bageoDataStep4['nama_unsur'] }}</li>
        <li>Nama Alias: {{ $bageoDataStep4['nama_alias'] }}</li>
        <li>Fitur: {{ $bageoDataStep4['fitur'] }}</li>
        <li>Format Data: {{ $bageoDataStep4['format_data'] }}</li>
        <li>SRS/CRS: {{ $bageoDataStep4['SRSCRS'] }}</li>
        <li>Skala: {{ $bageoDataStep4['skala'] }}</li>
        <li>Atribut: {{ $bageoDataStep4['atribut'] }}</li>
    </ul>

    <h4>Data Step 5</h4>
    <ul>
        <li>Nama: {{ $metadataValidatedData['nama'] }}</li>
        <li>Format Data: {{ $metadataValidatedData['format_data'] }}</li>
        <li>Catatan: {{ $metadataValidatedData['format_data'] }}</li>
        <li>Saran: {{ $metadataValidatedData['format_data'] }}</li>
        <li>Kelengkapan Dataset: {{ $penjaminanValidatedData['kelengkapan_dataset'] }}</li>
        <li>Konsistensi Logis: {{ $penjaminanValidatedData['konsistensi_logis'] }}</li>
        <li>Akurasi Posisi: {{ $penjaminanValidatedData['akurasi_posisi'] }}</li>
        <li>Akurasi Tematik: {{ $penjaminanValidatedData['akurasi_tematik'] }}</li>
        <li>Akurasi Temporal: {{ $penjaminanValidatedData['akurasi_temporal'] }}</li>
    </ul>

    
        <button type="submit" class="btn btn-primary">Simpan Berita Acara</button>
        <a href="{{ route('bageo.createStep5') }}" class="btn btn-secondary">Kembali</a>
    
</div>
</form>
@endsection