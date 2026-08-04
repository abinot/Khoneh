<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(20);

        return view('admin.dashboard', [
            'users' => $users,
            'auth' => auth()->user(),
            'totalUsers' => User::count(),
            'activeUsers' => User::where('is_active', true)->count(),
            'registrationEnabled' => Setting::get('registration_enabled') === '1',
        ]);
    }

    public function toggleActive(User $user)
    {
        if ($user->isAdmin()) {
            return back()->withErrors(['error' => 'نمی‌توانید ادمین اصلی را غیرفعال کنید.']);
        }

        $user->update(['is_active' => ! $user->is_active]);

        return back()->with('status', 'وضعیت کاربر به‌روزرسانی شد.');
    }

    public function updateRole(Request $request, User $user)
    {
        $request->validate(['role' => ['required', 'in:admin,user']]);

        if ($user->isAdmin()) {
            return back()->withErrors(['error' => 'نمی‌توانید نقش ادمین اصلی را تغییر دهید.']);
        }

        $user->update(['role' => $request->input('role')]);

        return back()->with('status', 'نقش کاربر تغییر کرد.');
    }

    public function destroy(User $user)
    {
        if ($user->isAdmin()) {
            return back()->withErrors(['error' => 'نمی‌توانید ادمین اصلی را حذف کنید.']);
        }

        $user->delete();

        return back()->with('status', 'کاربر حذف شد.');
    }

    public function toggleRegistration(Request $request)
    {
        $request->validate(['value' => ['required', 'in:1,0']]);

        Setting::set('registration_enabled', $request->input('value'));

        return back()->with('status', 'تنظیم ثبت‌نام به‌روزرسانی شد.');
    }
}
