<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function showDashboard()
    {
        return view('admin.dashboard');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required|min:3',
        ]);

        $admin = DB::table('admin')->where('username', $request->input('username'))->first();

        if ($admin && $request->input('password') === $admin->password) {
            // Login berhasil
            session(['admin_logged_in' => true]);
            return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
        }

        return redirect()->route('admin.login')->withErrors(['username' => 'Username atau password salah.'])->withInput();
    }

    public function logout()
    {
        session(['admin_logged_in' => false]);
        return redirect('/login');
    }
}
