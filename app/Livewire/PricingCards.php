<?php

namespace App\Livewire;

use Livewire\Component;

class PricingCards extends Component
{
    public ?string $selectedPlan = null;

    public array $plans = [];

    public function mount(): void
    {
        $this->plans = [
            [
                'id' => 'starter',
                'name' => 'Starter',
                'price' => 'رایگان',
                'period' => '',
                'features' => [
                    '۱ منوی دیجیتال',
                    '۱۰۰ سفارش/ماه',
                    'پشتیبانی ایمیلی',
                    'گزارش پایه',
                ],
                'cta' => 'شروع رایگان',
                'featured' => false,
            ],
            [
                'id' => 'growth',
                'name' => 'Growth',
                'price' => '۱۹۹,۰۰۰',
                'period' => 'تومان/ماه',
                'features' => [
                    '۵ منوی دیجیتال',
                    'سفارش نامحدود',
                    'CRM پیشرفته',
                    'گزارش پیشرفته',
                    'پشتیبانی تلفنی',
                ],
                'cta' => 'شروع کن',
                'featured' => true,
            ],
            [
                'id' => 'enterprise',
                'name' => 'Enterprise',
                'price' => 'تماس بگیرید',
                'period' => '',
                'features' => [
                    'منو نامحدود',
                    'API اختصاصی',
                    'چندشعبه‌ای',
                    'SLA تضمینی',
                    'پشتیبانی ۲۴/۷',
                    'آموزش اختصاصی',
                ],
                'cta' => 'تماس با فروش',
                'featured' => false,
            ],
        ];
    }

    public function selectPlan(string $planId): void
    {
        $this->selectedPlan = $planId;
        $this->dispatch('plan-selected', plan: $planId);
    }

    public function render()
    {
        return view('livewire.pricing-cards');
    }
}