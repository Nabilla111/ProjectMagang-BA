<style>
  .nav-item.dropdown .nav-link {
    font-size: 14px; /* Atur ukuran teks yang diinginkan di sini */
}
</style>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
  
  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
    <i class=""></i>
    </div>
    <div class="sidebar-brand-text mx-3">{{ auth()->user()->name }}</div></a>
    <div class="text-xs font-weight-bold text-white text-uppercase mb-1"><center>{{ auth()->user()->role }}</center></div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-4">
  
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- <li class="nav-item">
    <a class="nav-link" href="{{ route('ba') }}">
      <i class="fas fa-book"></i>
      <span>Berita Acara</span></a>
  </li> -->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-building"></i> Berita Acara
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
        <li><a class="dropdown-item" href="{{ route('ba') }}">Berita Acara Statistik</a></li>
        <li><a class="dropdown-item" href="{{ route('bageo') }}">Berita Acara Geospasial</a></li>
        
    </ul>
</li>

  <!-- <li class="nav-item">
    <a class="nav-link" href="{{ route('jenisba') }}">
      <i class="fas fa-building"></i>
      <span>Judul Berita Acara</span></a>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="{{ route('instansi') }}">
      <i class="fas fa-building"></i>
      <span>Instansi</span></a>
  </li> -->

  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-building"></i> Settings
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
        <li><a class="dropdown-item" href="{{ route('jenisba') }}">Jenis Berita Acara</a></li>
        <li><a class="dropdown-item" href="{{ route('instansi') }}">Instansi</a></li>
        <li><a class="dropdown-item" href="{{ route('jenisdata') }}">Jenis Data</a></li>
        <li><a class="dropdown-item" href="{{ route('ttd.index') }}">Tanda Tangan</a></li>
    </ul>
</li>

   <!-- <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fas fa-building"></i> Rekap Berita Acara
    </a>
    <ul class="dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
        <li><a class="dropdown-item" href="{{ route('rekapbastatistik') }}">Berita Acara Statistik</a></li>
        <li><a class="dropdown-item" href="{{ route('rekapbageospasial') }}">Berita Acara Geospasial</a></li>
    </ul>
</li> -->

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>
  
  
</ul>

