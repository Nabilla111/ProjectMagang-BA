@extends('layouts.app')
  
@section('title', 'Dashboard - Berita Acara Pemenuhan Data')
  
@section('contents')

<div class="row">
    <div class="col-lg-12 col-md-12 col-12">
        <div>
            <div class="d-flex justify-content-between align-items-center">
            </div>
        </div>
    </div>
    <div class="mt-6 col-xl-3 col-lg-6 col-md-12 col-12">
        <div class="card border-bottom-primary shadow h-100 py-2">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div><h4 class="mb-0">Berita Acara Pemenuhan Statistik Sektoral</h4></div>
                    <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                            <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v8A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-8A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5zm1.886 6.914L15 7.151V12.5a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5V7.15l6.614 1.764a1.5 1.5 0 0 0 .772 0zM1.5 4h13a.5.5 0 0 1 .5.5v1.616L8.129 7.948a.5.5 0 0 1-.258 0L1 6.116V4.5a.5.5 0 0 1 .5-.5z">
                                </path>
                            </svg>
                        </div>
                    </div>
                    <div><h1 class="fw-bold">{{ $jumlah_statistik_sektoral }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="mt-6 col-xl-3 col-lg-6 col-md-12 col-12">
            <div class="card border-bottom-danger shadow h-100 py-2">
            <div class="card"><div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div><h4 class="mb-0">Berita Acara Pemeriksaan Data Geospasial</h4>
                    </div>
                    <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                            <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z"></path>
                            <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z"></path>
                            <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z"></path>
                        </svg>
                    </div>
                </div>
                <div><h1 class="fw-bold">{{ $jumlah_pemeriksaan_geospasial }}</h1>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="mt-6 col-xl-3 col-lg-6 col-md-12 col-12">
        <div class="card border-bottom-warning shadow h-100 py-2">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div><h4 class="mb-0">Berita Acara Kesepakatan Format Data</h4></div>
                    <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"></path>
                        </svg>
                    </div>
                </div>
                <div><h1 class="fw-bold"> {{ $jumlah_kesepakatan_format_data }} </h1>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="mt-6 col-xl-3 col-lg-6 col-md-12 col-12">
        <div class="card border-bottom-success shadow h-100 py-2">
        <div class="card">
            <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div><h4 class="mb-0"></h4>
                </div>
                <div class="icon-shape icon-md bg-light-primary text-primary rounded-2">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                        <path d="M8 13A5 5 0 1 1 8 3a5 5 0 0 1 0 10zm0 1A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
                        <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8z"></path>
                        <path d="M9.5 8a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                    </svg>
                </div>
            </div>
            <div>
                <h1 class="fw-bold"></h1>
                <p class="mb-0">
                </div>
            </div>
        </div>
    </div>
</div>
</div>

         <div class="row my-4">
          <div class="col-xl-6 col-xxl-12">
                <!-- Team members / people dashboard card example-->
                <div class="card mb-4">
                    <div class="card-header"><b>Regulasi Satu Data Jawa Tengah</b></div>
                    <div class="card-body">
                      
                        <!-- Item 1-->
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center flex-shrink-0 me-3">
                                <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-1.png" alt=""></div>
                                <div class="d-flex flex-column fw-bold">
                                    <a class="text-dark line-height-normal mb-1" href="https://drive.google.com/file/d/1YpMu4tO8s07NQwCei4toTBbl3LVAgyeo/view?usp=sharing" target="_blank">Peraturan Gubernur 6 Tahun 2022 </a>
                                    <div class="medium text-muted line-height-normal">Tentang Satu Data Jawa Tengah</div>
                                </div>
                            </div>
                        </div>
                        <!-- Item 2-->
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center flex-shrink-0 me-3">
                                <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-2.png" alt=""></div>
                                <div class="d-flex flex-column fw-bold">
                                    <a class="text-dark line-height-normal mb-1" href="https://drive.google.com/file/d/1dLo955JaA_YmB1kWCXHrH21N9NFAOY3h/view?usp=sharing" target="_blank">SK Gubernur Jawa Tengah</a>
                                    <div class="medium text-muted line-height-normal">Tentang Penyelenggara dan Sekretariat SDJT</div>
                                </div>
                            </div>
                        </div>
                        <!-- Item 3-->
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center flex-shrink-0 me-3">
                                <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-3.png" alt=""></div>
                                <div class="d-flex flex-column fw-bold">
                                    <a class="text-dark line-height-normal mb-1" href="https://drive.google.com/file/d/1KXWudqvLvX2X0bDoGacqGgSAvBnc5r0P/view?usp=sharing" target="_blank">SK Sekda Provinsi Jawa Tengah</a>
                                    <div class="medium text-muted line-height-normal">Tentang Proses Bisnis Penyelenggaraan Satu Data Jawa Tengah</div>
                                </div>
                            </div>
                        </div>
                        <!-- Item 4-->
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center flex-shrink-0 me-3">
                                <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-4.png" alt=""></div>
                                <div class="d-flex flex-column fw-bold">
                                    <a class="text-dark line-height-normal mb-1" href="https://drive.google.com/file/d/1nzGsPY-1jjQZb0W0_BErPwj7Tcc9maSX/view?usp=sharing" target="_blank">SK Sekda Provinsi Jawa Tengah</a>
                                    <div class="medium text-muted line-height-normal">Tentang Penyelenggara Informasi Geospasial Tematik</div>
                                </div>
                            </div>
                        </div>
                        <!-- Item 5-->
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="d-flex align-items-center flex-shrink-0 me-3">
                                <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-5.png" alt=""></div>
                                <div class="d-flex flex-column fw-bold">
                                    <a class="text-dark line-height-normal mb-1" href="https://drive.google.com/file/d/1Jz_WmfOGIwp3lPiMCjVO6bEKSS1k5Mx_/view?usp=sharing" target="_blank">Standar Operasional Prosedur (SOP)</a>
                                    <div class="medium text-muted line-height-normal">Perencanaan Data</div>
                                </div>
                            </div>
                        </div>
                        <!-- Item 6-->
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center flex-shrink-0 me-3">
                                <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-6.png" alt=""></div>
                                <div class="d-flex flex-column fw-bold">
                                    <a class="text-dark line-height-normal mb-1" href="https://drive.google.com/file/d/1wOMy-9RYEUbjiSC8PB8L4rRSaFmk-sBl/view?usp=sharing" target="_blank">Standar Operasional Prosedur (SOP)</a>
                                    <div class="medium text-muted line-height-normal">Pengumpulan Data</div>
                                </div>
                            </div>
                        </div>
                         <!-- Item 7-->
                         <br>
                        <div class="d-flex align-items-center justify-content-between">
                          <div class="d-flex align-items-center flex-shrink-0 me-3">
                              <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-6.png" alt=""></div>
                              <div class="d-flex flex-column fw-bold">
                                  <a class="text-dark line-height-normal mb-1" href="https://drive.google.com/file/d/1A7qx-TICdbAHPZDc3IhZvGJMRC8quahD/view?usp=sharing" target="_blank">Standar Operasional Prosedur (SOP)</a>
                                  <div class="medium text-muted line-height-normal">Pemeriksaan Data</div>
                              </div>
                          </div>
                        </div>
                      <!-- Item 8-->
                      <br>
                      <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center flex-shrink-0 me-3">
                            <div class="avatar avatar-xl me-3 bg-gray-200"><img class="avatar-img img-fluid" src="assets/img/illustrations/profiles/profile-6.png" alt=""></div>
                            <div class="d-flex flex-column fw-bold">
                                <a class="text-dark line-height-normal mb-1" href="https://drive.google.com/file/d/12vrb_UbCo309PWZc73q6rcwR8esBCKz0/view?usp=sharing" target="_blank">Standar Operasional Prosedur (SOP)</a>
                                <div class="medium text-muted line-height-normal">Penyebarluasan Data</div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-12">
                <!-- Project tracker card example-->
                <div class="card card-header-actions mb-4">
                    <div class="card-header">
                       <b>Jumlah Berita Acara</b>
                    </div>
                    <div class="card-body">
                        <!-- Progress item 1-->
                        <div class="d-flex align-items-center justify-content-between small mb-1">
                            <div class="fw-bold">BA Pemenuhan Data Statistik Sektoral</div>
                            <div class="medium">{{ $persentase_instansi_statistik_sektoral }}%</div>
                        </div>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $persentase_instansi_statistik_sektoral }}%" aria-valuenow="{{ $persentase_instansi_statistik_sektoral }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <!-- Progress item 2-->
                        <div class="d-flex align-items-center justify-content-between small mb-1">
                            <div class="fw-bold">BA Pemeriksaan Data Geospasial</div>
                            <div class="medium">{{ $persentase_instansi_geospasial }}%</div>
                        </div>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $persentase_instansi_geospasial }}%" aria-valuenow="{{ $persentase_instansi_geospasial }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <!-- Progress item 3-->
                        <div class="d-flex align-items-center justify-content-between small mb-1">
                            <div class="fw-bold">BA Pemenuhan Kesepakatan Format Data</div>
                            <div class="medium">{{ $persentase_instansi_kesepakatan_format_data }}%</div>
                        </div>
                        <div class="progress mb-3">
                            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $persentase_instansi_kesepakatan_format_data }}%" aria-valuenow="{{ $persentase_instansi_kesepakatan_format_data }}" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="card card-header-actions mb-4">
                        <div class="card-header">
                            <b>Instansi yang belum melakukan desk</b>
                        </div>
                        <div class="card-body">
                            <!-- Instansi yang belum input BA Pemenuhan Data Statistik Sektoral -->
                            <div class="d-flex align-items-center justify-content-between small mb-1">
                                <div class="fw-bold"><h6>Pemenuhan Data Statistik Sektoral</h6></div>
                                <div class="medium">
                                    <button class="btn btn-primary" id="toggleStatistikDropdown">Tampilkan Instansi</button>
                                    <div id="statistikDropdown" style="display: none;">
                                        @foreach($instansi_belum_input_statistik as $instansi)
                                            {{ $instansi }}<br>
                                        @endforeach
                                    </div>
                                    <div class="small text-muted jumlah"><span>Jumlah:</span> {{ count($instansi_belum_input_statistik) }}</div>
                                </div>
                            </div>
                            <hr>
                            <!-- Instansi yang belum input BA Pemenuhan Data Geospasial -->
                            <div class="d-flex align-items-center justify-content-between small mb-1">
                                <div class="fw-bold"><h6>Pemeriksaan Data Geospasial</h6></div>
                                <div class="medium">
                                    <button class="btn btn-primary" id="toggleGeospasialDropdown">Tampilkan Instansi</button>
                                    <div id="geospasialDropdown" style="display: none;">
                                        @foreach($instansi_belum_input_geospasial as $instansi)
                                            {{ $instansi }}<br>
                                        @endforeach
                                    </div>
                                    <div class="small text-muted jumlah"><span>Jumlah:</span> {{ count($instansi_belum_input_geospasial) }}</div>
                                </div>
                            </div>
                            <hr>
                            <!-- Instansi yang belum input BA Kesepakatan Format Data -->
                            <div class="d-flex align-items-center justify-content-between small mb-1">
                                <div class="fw-bold"><h6>Kesepakatan Format Data</h6></div>
                                <div class="medium">
                                    <button class="btn btn-primary" id="toggleKesepakatanDropdown">Tampilkan Instansi</button>
                                    <div id="kesepakatanDropdown" style="display: none;">
                                        @foreach($instansi_belum_input_kesepakatan_format_data as $instansi)
                                            {{ $instansi }}<br>
                                        @endforeach
                                    </div>
                                    <div class="small text-muted jumlah"><span>Jumlah:</span> {{ count($instansi_belum_input_kesepakatan_format_data) }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <style>
                        .jumlah {
                            font-size: larger;
                        }
                    </style>
                                     
            </div>
            </div>
        </div>
        <!-- Illustration dashboard card example-->
    </div>
</div>
</div>
<script>
    // JavaScript to toggle dropdown visibility
    document.getElementById("toggleStatistikDropdown").addEventListener("click", function() {
        var dropdown = document.getElementById("statistikDropdown");
        if (dropdown.style.display === "none") {
            dropdown.style.display = "block";
        } else {
            dropdown.style.display = "none";
        }
    });

    document.getElementById("toggleGeospasialDropdown").addEventListener("click", function() {
        var dropdown = document.getElementById("geospasialDropdown");
        if (dropdown.style.display === "none") {
            dropdown.style.display = "block";
        } else {
            dropdown.style.display = "none";
        }
    });

    document.getElementById("toggleKesepakatanDropdown").addEventListener("click", function() {
        var dropdown = document.getElementById("kesepakatanDropdown");
        if (dropdown.style.display === "none") {
            dropdown.style.display = "block";
        } else {
            dropdown.style.display = "none";
        }
    });
</script>
@endsection