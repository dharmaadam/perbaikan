<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'username' => 'required|string',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

    return back()->withErrors([
        'loginError' => 'Username atau password salah!',
    ])->withInput();
}

   public function logout(Request $request)
{
    Auth::logout();

    // Hapus session biar lebih bersih
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login.form');
}

}
