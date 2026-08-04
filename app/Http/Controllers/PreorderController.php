<?php

namespace App\Http\Controllers;

use App\Models\Preorder;
use Illuminate\Http\Request;

class PreorderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'business_name' => 'required|string|max:255',
            'plan' => 'required|in:starter,growth,enterprise',
            'message' => 'nullable|string|max:5000',
        ]);

        Preorder::create($validated);

        return back()->with('preorder_success', 'پیش‌ثبت‌نام شما با موفقیت انجام شد. به زودی با شما تماس می‌گیریم.');
    }
}
