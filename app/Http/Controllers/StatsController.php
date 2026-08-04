<?php

namespace App\Http\Controllers;

use App\Services\StatsService;

class StatsController extends Controller
{
    public function index()
    {
        $stats = StatsService::landingStats();

        return response()->json([
            'tenants' => $stats['tenants'] . '+',
            'orders' => number_format($stats['orders']) . '+',
            'menus' => number_format($stats['menus']) . '+',
            'uptime' => $stats['uptime'] . '%',
        ]);
    }
}