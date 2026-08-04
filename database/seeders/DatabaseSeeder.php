<?php

namespace Database\Seeders;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        Setting::updateOrCreate(['key' => 'registration_enabled'], ['value' => '1']);

        $email = $this->command->ask('ایمیل ادمین را وارد کنید');
        $name = $this->command->ask('نام کاربری ادمین', explode('@', $email)[0]);

        // حلقه برای تطابق دو پسورد
        do {
            $password = $this->command->secret('رمز عبور ادمین را وارد کنید');
            $passwordConfirmation = $this->command->secret('رمز عبور را مجدداً وارد کنید');

            if ($password !== $passwordConfirmation) {
                $this->command->error('رمزهای عبور با هم تطابق ندارند! دوباره تلاش کنید.');
            }
        } while ($password !== $passwordConfirmation);

        User::updateOrCreate(
            ['email' => $email],
            [
                'name' => $name,
                'password' => Hash::make($password),
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        $this->command->info("کاربر ادمین با ایمیل $email با موفقیت ساخته شد.");

        Setting::updateOrCreate(['key' => 'registration_enabled'], ['value' => '0']);
    }
}
