<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }

  public function dologin(Request $request) {
      // validasi
      $credentials = $request->validate([
          'username' => 'required',
          'password' => 'required'
      ]);

      

      if (auth()->attempt($credentials)) {

          // buat ulang session login
          
          $request->session()->regenerate();

          if (auth()->user()->role === 'siswa') {
              // jika user superadmin
              return redirect()->intended('/dashboard');
          } else if(auth()->user()->role === 'admin') {
              // jika user pegawai
              return redirect()->intended('/dashboard');
          }
      }

      // jika email atau password salah
      // kirimkan session error
      return back()->with('error', 'username atau password salah');
  }

  public function logout(Request $request) {
      auth()->logout();
      $request->session()->invalidate();
      $request->session()->regenerateToken();
      return redirect('/');
  }

}
