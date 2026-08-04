<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'ایمیل یا رمز عبور اشتباه است.']);
        }

        $user = Auth::user();

        if (! $user->is_active) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'حساب کاربری شما غیرفعال شده است.']);
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function showRegister()
    {
        if (Setting::get('registration_enabled') !== '1') {
            abort(404, 'صفحه مورد نظر وجود ندارد');
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        if (Setting::get('registration_enabled') !== '1') {
            abort(404, 'صفحه مورد نظر وجود ندارد');
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            'password_confirmation' => ['required', 'same:password'],
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'user',
            'is_active' => true,
        ]);

        return redirect()->route('login')
            ->with('status', 'ثبت‌نام با موفقیت انجام شد. لطفاً وارد شوید.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}