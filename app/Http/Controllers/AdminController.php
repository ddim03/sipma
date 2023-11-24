<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

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

        $credentials = $request->only('username', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            // Login berhasil
            return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
        } else {
            return redirect()->route('admin.login')->withErrors([
                'credentials' => 'Kombinasi username dan password tidak cocok.'
            ])->withInput();
        }
    }        
    public function logout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }
}
