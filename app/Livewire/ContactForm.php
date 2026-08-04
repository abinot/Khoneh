<?php

namespace App\Livewire;

use App\Models\Contact;
use Illuminate\Support\Facades\RateLimiter;
use Livewire\Component;

class ContactForm extends Component
{
    public string $name = '';
    public string $email = '';
    public string $phone = '';
    public string $businessType = '';
    public string $message = '';

    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'businessType' => 'required|in:restaurant,law_office,other',
            'message' => 'required|string|max:5000',
        ];
    }

    public function submit(): void
    {
        $this->validate();

        $ip = request()->ip();
        $key = 'contact-form:' . $ip;

        if (RateLimiter::tooManyAttempts($key, 3)) {
            $this->addError('rate', 'شما بیش از حد مجاز درخواست ارسال کرده‌اید. لطفاً یک ساعت بعد تلاش کنید.');
            return;
        }

        RateLimiter::hit($key, 3600);

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone ?: null,
            'business_type' => $this->businessType,
            'message' => $this->message,
        ]);

        session()->flash('success', 'پیام شما با موفقیت ارسال شد. در اسرع وقت با شما تماس می‌گیریم.');

        $this->reset(['name', 'email', 'phone', 'businessType', 'message']);
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}