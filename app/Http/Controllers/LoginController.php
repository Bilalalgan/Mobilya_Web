<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Login formunu göster
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Login işlemi
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Giriş başarılı, anasayfaya yönlendir
            return redirect('/')->with('success', 'Giriş yaptınız');
        }

        // Giriş başarısız, hata mesajını geri gönder
        return redirect()->back()->withInput()->withErrors([
            'email' => 'Geçersiz e-posta veya şifre.',
        ]);
    }

    // Logout işlemi
    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('success', 'Başarıyla çıkış yaptınız.');
    }
}
