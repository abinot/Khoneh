<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $password = Str::password(20);

        User::updateOrCreate(
            ['email' => 'fenfen1290@gmail.com'],
            [
                'name' => 'Moin',
                'password' => $password,
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        Setting::updateOrCreate(['key' => 'registration_enabled'], ['value' => '1']);

        $this->command?->info('Admin created for fenfen1290@gmail.com. Login password: '.$password);
    }
}
