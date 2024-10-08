<?php

namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth/register');
    }
  
    public function registerBa(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'nip' => 'required',
            'instansi' => 'required',
            'role' => 'required',
            'telpon' => 'required',
            'password' => 'required|confirmed'
        ])->validate();
  
        User::create([
            'name' => $request->name,
            'nip' => $request->nip,
            'instansi' => $request->instansi,
            'role' => $request->role,
            'telpon' => $request->telpon,
            'password' => Hash::make($request->password),
            'level' => 'Admin'
        ]);
  
        return redirect()->route('login');
    }
  
    public function login()
    {
        return view('auth/login');
    }
  
    public function loginBa(Request $request)
    {
        Validator::make($request->all(), [
            'nip' => 'required',
            'password' => 'required'
        ])->validate();
  
        if (!Auth::attempt($request->only('nip', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'nip' => trans('auth.failed')
            ]);
        }
  
        $request->session()->regenerate();
  
        return redirect()->route('dashboard');
    }
  
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
  
        $request->session()->invalidate();
  
        return redirect('/');
    }
 
    public function profile()
    {
        return view('profile');
    }
}