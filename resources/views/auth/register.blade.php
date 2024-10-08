<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>BA - Register</title>
  <!-- Custom fonts for this template-->
  <link href="{{ asset('admin_assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  
  <!-- Custom styles for this template-->
  <link href="{{ asset('admin_assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>
<body class="bg-gradient-primary">
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
          {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"><img src="\admin_assets\img\at-work.svg"></div> --}}
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Buat Akun Pemeriksa</h1>
              </div>
              <form action="{{ route('register.ba') }}" method="POST" class="user">
               @csrf
                <div class="form-group">
                  <input name="name" type="text" class="form-control form-control-user @error('name')is-invalid @enderror" id="exampleInputName" placeholder="Name">
                  @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <input name="nip" type="text" class="form-control form-control-user @error('nip')is-invalid @enderror" id="exampleInputNip" placeholder="NIP">
                  @error('nip')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <select name="instansi" id="nama_instansi" class="form-control @error('nama_instansi')is-invalid @enderror" >
                    <option value="">-Pilih Instansi-</option>
                    <?php
                            $con =mysqli_connect("localhost","root","","badesk");
                            $sql_instansis=mysqli_query($con,"SELECT*From instansis order by nama_instansi asc") or die
                            (mysqli_eror($con));
                            while ($instansis=mysqli_fetch_array($sql_instansis)) {
                                echo '<option value="'.$instansis['nama_instansi'].'">',
                                            $instansis['nama_instansi'].'</option>';
                                    
                            }?>
                            </select>
                  @error('instansi')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <select name="role" id="nama_role" class="form-control @error('role')is-invalid @enderror">
                    <option value="">-Pilih Role-</option>
                    <?php
                    $con =mysqli_connect("localhost","root","","badesk");
                    $sql_roles=mysqli_query($con,"SELECT*From roles order by role asc") or die
                    (mysqli_eror($con));
                    while ($roles=mysqli_fetch_array($sql_roles)) {
                        echo '<option value="'.$roles['role'].'">',
                                    $roles['role'].'</option>';
                            
                    }?>
                    </select>
                  @error('role')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group">
                  <input name="telpon" type="string" class="form-control form-control-user @error('telpon')is-invalid @enderror" id="exampleInputTelpon" placeholder="Telpon">
                  @error('telpon')
                    <span class="invalid-feedback">{{ $message }}</span>
                  @enderror
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input name="password" type="password" class="form-control form-control-user @error('password')is-invalid @enderror" id="exampleInputPassword" placeholder="Password">
                    @error('password')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  <div class="col-sm-6">
                    <input name="password_confirmation" type="password" class="form-control form-control-user @error('password_confirmation')is-invalid @enderror" id="exampleRepeatPassword" placeholder="Repeat Password">
                    @error('password_confirmation')
                      <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                  </div>
                  </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="{{ route('login') }}">Sudah mempunyai Akun? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  
  <!-- Core plugin JavaScript-->
  <script src="{{ asset('admin_assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  
  <!-- Custom scripts for all pages-->
  <script src="{{ asset('admin_assets/js/sb-admin-2.min.js') }}"></script>
</body>
</html>