<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show Login Form
    public function showLogin()
    {
        return view('auth.login');
    }

    // Process Login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Attempt login
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Check if user is banned
            if (!$user->isActived) {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('error', 'Tài khoản của bạn đã bị khóa hoặc vô hiệu hóa.');
            }

            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('error', 'Sai tên đăng nhập hoặc mật khẩu.')->onlyInput('username');
    }

    // Show Register Form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Process Register
    public function register(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:100', 'unique:users'],
            'fullname' => ['required', 'string', 'max:100'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'password' => Hash::make($request->password), // Password hashed
            'isAdmin' => 0,
            'isActived' => 1,
        ]);

        Auth::login($user);

        return redirect('/');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
