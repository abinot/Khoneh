<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class StatsService
{
    public const CACHE_KEY = 'landing_stats';

    public const CACHE_TTL = 300;

    public static function landingStats(): array
    {
        return Cache::remember(self::CACHE_KEY, self::CACHE_TTL, function () {
            return [
                'tenants' => 500,
                'orders' => 10000,
                'menus' => 2000,
                'uptime' => 99.9,
            ];
        });
    }
}
