<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'business_type' => 'required|in:restaurant,law_office,other',
            'message' => 'required|string|max:5000',
        ]);

        $ip = $request->ip();
        $key = 'contact-form:' . $ip;

        if (RateLimiter::tooManyAttempts($key, 3)) {
            return back()->withErrors([
                'rate' => 'شما بیش از حد مجاز درخواست ارسال کرده‌اید. لطفاً یک ساعت بعد تلاش کنید.',
            ])->withInput();
        }

        RateLimiter::hit($key, 3600);

        Contact::create($validated);

        // TODO: Send email notification to admin
        // Mail::to(config('app.admin_email'))->send(new ContactNotification($contact));

        return back()->with('success', 'پیام شما با موفقیت ارسال شد. در اسرع وقت با شما تماس می‌گیریم.');
    }
}