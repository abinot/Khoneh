<?php

namespace App\Http\Controllers;

use App\Services\StatsService;
use Illuminate\View\View;

class LandingController extends Controller
{
    public function index(): View
    {
        return view('landing', ['stats' => StatsService::landingStats()]);
    }

    public function pricing(): View
    {
        return view('livewire.pricing-page');
    }

    public function demo()
    {
        return redirect()->away('https://demo.sopal.ir');
    }

    public function about(): View
    {
        return view('about');
    }

    public function contact(): View
    {
        return view('contact');
    }
}