<?php

namespace App\Livewire;

use Livewire\Component;

class StatsCounter extends Component
{
    public int $tenants = 0;

    public int $orders = 0;

    public int $menus = 0;

    public float $uptime = 99.9;

    public function mount(): void
    {
        $this->loadStats();
    }

    public function loadStats(): void
    {
        $this->tenants = 500;
        $this->orders = 10000;
        $this->menus = 2000;
        $this->uptime = 99.9;
    }

    public function render()
    {
        return view('livewire.stats-counter');
    }
}
