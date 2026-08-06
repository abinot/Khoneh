<?php

namespace Tests\Feature;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthRegistrationTest extends TestCase
{
    use RefreshDatabase;

    private function enableRegistration(bool $enabled = true): void
    {
        Setting::updateOrCreate(['key' => 'registration_enabled'], ['value' => $enabled ? '1' : '0']);
    }

    private function test_fields(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Sara Mohammadi',
            'email' => 'sara@example.com',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
        ], $overrides);
    }

    public function test_register_page_renders_when_enabled(): void
    {
        $this->enableRegistration();

        $this->get(route('register'))
            ->assertOk()
            ->assertSee('ساخت حساب جدید');
    }

    public function test_register_page_404_when_disabled(): void
    {
        $this->enableRegistration(false);

        $this->get(route('register'))->assertNotFound();
        $this->post(route('register'), $this->test_fields())
            ->assertNotFound();
    }

    public function test_user_can_register_and_is_redirected_to_login(): void
    {
        $this->enableRegistration();

        $this->post(route('register'), $this->test_fields())
            ->assertRedirect(route('login'))
            ->assertSessionHas('status');

        $this->assertDatabaseHas('users', ['email' => 'sara@example.com', 'role' => 'user', 'is_active' => 1]);
    }

    public function test_register_rejects_duplicate_email(): void
    {
        $this->enableRegistration();
        User::factory()->create(['email' => 'sara@example.com']);

        $this->post(route('register'), $this->test_fields())
            ->assertSessionHasErrors('email');
    }

    public function test_register_rejects_short_password(): void
    {
        $this->enableRegistration();

        $this->post(route('register'), $this->test_fields(['password' => '123', 'password_confirmation' => '123']))
            ->assertSessionHasErrors('password');
    }

    public function test_register_rejects_confirmation_mismatch(): void
    {
        $this->enableRegistration();

        $this->post(route('register'), $this->test_fields(['password_confirmation' => 'not-matching']))
            ->assertSessionHasErrors('password_confirmation');
    }
}
