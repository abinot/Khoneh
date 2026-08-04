<?php

namespace App\Livewire;

use App\Models\Newsletter;
use Livewire\Component;

class NewsletterForm extends Component
{
    public string $email = '';

    protected function rules(): array
    {
        return [
            'email' => 'required|email|max:255|unique:newsletters,email',
        ];
    }

    protected function messages(): array
    {
        return [
            'email.unique' => 'این ایمیل قبلاً در خبرنامه ثبت شده است.',
            'email.required' => 'لطفاً ایمیل خود را وارد کنید.',
            'email.email' => 'لطفاً یک ایمیل معتبر وارد کنید.',
        ];
    }

    public function subscribe(): void
    {
        $this->validate();

        Newsletter::create([
            'email' => $this->email,
            'subscribed_at' => now(),
        ]);

        session()->flash('newsletter_success', 'ایمیل شما با موفقیت در خبرنامه ثبت شد.');

        $this->reset('email');
    }

    public function render()
    {
        return view('livewire.newsletter-form');
    }
}
