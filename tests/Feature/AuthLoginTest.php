<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthLoginTest extends TestCase
{
    use RefreshDatabase;

    private function makeUser(array $overrides = []): User
    {
        return User::factory()->create(array_merge([
            'email' => 'moin@example.com',
            'password' => 'secret123',
        ], $overrides));
    }

    public function test_login_page_renders(): void
    {
        $this->get(route('login'))->assertOk()->assertSee('ورود');
    }

    public function test_user_can_login_and_reach_dashboard(): void
    {
        $user = $this->makeUser();

        $this->post(route('login'), ['email' => $user->email, 'password' => 'secret123'])
            ->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_login_rejects_wrong_password(): void
    {
        $user = $this->makeUser();

        $this->post(route('login'), ['email' => $user->email, 'password' => 'wrong-password'])
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_login_rejects_unknown_email(): void
    {
        $this->post(route('login'), ['email' => 'nobody@example.com', 'password' => 'secret123'])
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_login_rejects_inactive_user(): void
    {
        $user = $this->makeUser(['is_active' => false]);

        $this->post(route('login'), ['email' => $user->email, 'password' => 'secret123'])
            ->assertSessionHasErrors('email');

        $this->assertGuest();
    }

    public function test_dashboard_requires_auth(): void
    {
        $this->get(route('dashboard'))->assertRedirect(route('login'));
    }

    public function test_logout_logs_user_out(): void
    {
        $user = $this->makeUser();
        $this->actingAs($user);

        $this->post(route('logout'))->assertRedirect(route('home'));

        $this->assertGuest();
    }
}
