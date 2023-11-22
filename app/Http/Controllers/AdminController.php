<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Menampilkan formulir login admin.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Proses login admin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validasi formulir
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6',
        ]);

        // Ganti 'email' menjadi 'username' dalam $credentials
        $credentials = $request->only('username', 'password');

        // Ganti 'email' menjadi 'username' pada metode attempt
        if (Auth::guard('admin')->attempt($credentials)) {
            // Login berhasil
            return redirect()->intended('/admin/dashboard')->with('success', 'Login berhasil!');
        }

        // Login gagal
        return redirect()->route('admin.login')->withErrors(['username' => 'Username atau password salah.'])->withInput();
    }

    /**
     * Logout admin.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }
}
