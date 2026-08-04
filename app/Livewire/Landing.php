<?php

namespace App\Livewire;

use Livewire\Component;

class Landing extends Component
{
    public int $restaurantCount = 0;

    public int $orderCount = 0;

    public float $uptimePercent = 0;

    public bool $darkMode = false;

    protected $listeners = [
        'toggleDarkMode' => 'toggleDarkMode',
    ];

    public function mount(): void
    {
        $this->darkMode = session('dark_mode', false);
    }

    public function toggleDarkMode(): void
    {
        $this->darkMode = ! $this->darkMode;
        session(['dark_mode' => $this->darkMode]);
    }

    public function animateCounters(): void
    {
        $this->dispatch('startCounters');
    }

    public function render()
    {
        return view('livewire.landing')->layout('layouts.guest');
    }
}
