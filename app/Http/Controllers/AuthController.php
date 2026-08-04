<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

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

        // مقایسه بدون حساسیت به بزرگ/کوچک
        $user = User::whereRaw('LOWER(email) = ?', [Str::lower($credentials['email'])])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'ایمیل یا رمز عبور اشتباه است.']);
        }

        if (! $user->is_active) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors(['email' => 'حساب کاربری شما غیرفعال شده است.']);
        }

        Auth::login($user, $request->boolean('remember'));
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
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
            'email' => [
                'required',
                'email',
                'max:255',
                // بررسی یونیک بودن بدون حساسیت به بزرگ/کوچک
                Rule::unique('users')->where(function ($query) use ($request) {
                    return $query->whereRaw('LOWER(email) = ?', [Str::lower($request->email)]);
                }),
            ],
            'password' => ['required', 'string', 'min:6'],
            'password_confirmation' => ['required', 'same:password'],
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'], // ذخیره دقیقاً همان چیزی که کاربر نوشته
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
