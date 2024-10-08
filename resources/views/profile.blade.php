@extends('layouts.app')
  
@section('title')
  
@section('contents')
    <h1 class="mb-0">Profile</h1>
    <hr />
 
    <form method="POST" enctype="multipart/form-data" id="profile_setup_frm" action="" >
        @csrf
    <div class="row">
        <div class="col-md-12 border-right">
            <div class="p-3 py-5">
                <!-- <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div> -->
                <div class="row" id="res"></div>
                <div class="row mt-2">
  
                    <div class="col-md-6">
                        <label class="labels">Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="first name" value="{{ auth()->user()->name }}">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">NIP</label>
                        <input type="text" name="email" disabled class="form-control" value="{{ auth()->user()->nip }}" placeholder="Nip">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Instansi</label>
                        <input type="text" name="instansi" class="form-control" placeholder="Instansi" value="{{ auth()->user()->instansi }}">
                    </div>
                <div class="row mt-2">
                    <div class="col-md-6">
                        <label class="labels">Role</label>
                        <input type="text" name="role" class="form-control" placeholder="Role" value="{{ auth()->user()->role }}">
                    </div>
                    <div class="col-md-6">
                        <label class="labels">Telepon</label>
                        <input type="text" name="telpon" class="form-control" value="{{ auth()->user()->telpon }}" placeholder="No. HP">
                    </div>
                </div>
                 
                <!-- <div class="mt-5 text-center"><button id="btn" class="btn btn-primary profile-button" type="submit">Simpan Profile</button></div> -->
            </div>
        </div>
         
    </div>   
            
        </form>
@endsection