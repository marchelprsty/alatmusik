<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('/create');
        }

        return back()->withErrors(['email' => 'Email atau password salah']);
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
{
    // Validasi data input dari form registrasi
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|unique:users|max:255',
        'password' => 'required|string|min:8|confirmed',
    ]);

    // Membuat pengguna baru dengan peran 'pembeli'
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'pembeli',
    ]);

    // Opsi: Logika selanjutnya, seperti login pengguna atau mengirim email verifikasi

    // Redirect atau memberikan respons yang sesuai
    return redirect('/login')->with('success', 'Pendaftaran berhasil! Silakan login.');
}


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
