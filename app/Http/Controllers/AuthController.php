<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->validated();

        // Email is normalized to lowercase by LoginRequest, so a plain
        // equality lookup is already case-insensitive.
        $user = User::where('email', $credentials['email'])->first();

        if (! $user || ! Hash::check($credentials['password'], $user->password)) {
            return $this->loginFailed($request, 'ایمیل یا رمز عبور اشتباه است.');
        }

        if (! $user->is_active) {
            return $this->loginFailed($request, 'حساب کاربری شما غیرفعال شده است.');
        }

        Auth::login($user, $credentials['remember'] ?? false);
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard'));
    }

    public function showRegister(): View
    {
        $this->abortUnlessRegistrationEnabled();

        return view('auth.register');
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $this->abortUnlessRegistrationEnabled();

        $data = $request->validated();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'], // normalized to lowercase by RegisterRequest
            'password' => Hash::make($data['password']),
            'role' => 'user',
            'is_active' => true,
        ]);

        return redirect()->route('login')
            ->with('status', 'ثبت‌نام با موفقیت انجام شد. لطفاً وارد شوید.');
    }

    public function showPassword(): View
    {
        return view('auth.password');
    }

    public function updatePassword(UpdatePasswordRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $request->user()->update([
            'password' => Hash::make($data['password']),
        ]);

        return back()->with('status', 'رمز عبور با موفقیت تغییر کرد.');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }

    private function loginFailed(LoginRequest $request, string $message): RedirectResponse
    {
        return back()
            ->withInput($request->only('email'))
            ->withErrors(['email' => $message]);
    }

    private function abortUnlessRegistrationEnabled(): void
    {
        abort_unless(Setting::get('registration_enabled') === '1', 404, 'صفحه مورد نظر وجود ندارد');
    }
}
