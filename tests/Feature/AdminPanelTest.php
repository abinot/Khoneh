<?php

namespace Tests\Feature;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    private function admin(): User
    {
        return User::factory()->create(['role' => 'admin', 'email' => 'admin@example.com']);
    }

    private function regularUser(): User
    {
        return User::factory()->create(['role' => 'user', 'email' => 'user@example.com']);
    }

    public function test_non_admin_gets_403(): void
    {
        $this->actingAs($this->regularUser())
            ->get(route('admin.dashboard'))
            ->assertForbidden();
    }

    public function test_guest_gets_redirected_to_login_from_admin(): void
    {
        $this->get(route('admin.dashboard'))->assertRedirect(route('login'));
    }

    public function test_admin_can_view_panel(): void
    {
        $this->actingAs($this->admin())
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('پنل مدیریت سوپال');
    }

    public function test_admin_can_deactivate_a_user(): void
    {
        $admin = $this->admin();
        $user = $this->regularUser();

        $this->actingAs($admin)
            ->patch(route('admin.users.toggle-active', $user))
            ->assertRedirect();

        $this->assertDatabaseHas('users', ['id' => $user->id, 'is_active' => 0]);
    }

    public function test_admin_can_reactivate_a_user(): void
    {
        $admin = $this->admin();
        $user = User::factory()->create(['is_active' => false]);

        $this->actingAs($admin)
            ->patch(route('admin.users.toggle-active', $user))
            ->assertRedirect();

        $this->assertDatabaseHas('users', ['id' => $user->id, 'is_active' => 1]);
    }

    public function test_admin_can_change_role(): void
    {
        $admin = $this->admin();
        $user = $this->regularUser();

        $this->actingAs($admin)
            ->patch(route('admin.users.update-role', $user), ['role' => 'admin'])
            ->assertRedirect();

        $this->assertDatabaseHas('users', ['id' => $user->id, 'role' => 'admin']);
    }

    public function test_admin_can_delete_a_user(): void
    {
        $admin = $this->admin();
        $user = $this->regularUser();

        $this->actingAs($admin)
            ->delete(route('admin.users.destroy', $user))
            ->assertRedirect();

        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_admin_cannot_delete_the_main_admin(): void
    {
        $mainAdmin = User::factory()->create(['role' => 'admin', 'email' => 'fenfen1290@gmail.com']);
        $otherAdmin = $this->admin();

        $this->actingAs($otherAdmin)
            ->delete(route('admin.users.destroy', $mainAdmin))
            ->assertSessionHasErrors('error');

        $this->assertDatabaseHas('users', ['id' => $mainAdmin->id]);
    }

    public function test_admin_cannot_toggle_the_main_admin(): void
    {
        $mainAdmin = User::factory()->create(['role' => 'admin', 'email' => 'fenfen1290@gmail.com']);
        $otherAdmin = $this->admin();

        $this->actingAs($otherAdmin)
            ->patch(route('admin.users.toggle-active', $mainAdmin))
            ->assertSessionHasErrors('error');

        $this->assertDatabaseHas('users', ['id' => $mainAdmin->id, 'is_active' => 1]);
    }

    public function test_admin_registration_toggle_on_is_green(): void
    {
        $admin = $this->admin();
        Setting::updateOrCreate(['key' => 'registration_enabled'], ['value' => '1']);

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('ریجیستر فعال');
    }

    public function test_admin_registration_toggle_off_is_red(): void
    {
        $admin = $this->admin();
        Setting::updateOrCreate(['key' => 'registration_enabled'], ['value' => '0']);

        $this->actingAs($admin)
            ->get(route('admin.dashboard'))
            ->assertOk()
            ->assertSee('ریجیستر غیرفعال');
    }

    public function test_admin_can_toggle_registration_setting(): void
    {
        $admin = $this->admin();
        Setting::updateOrCreate(['key' => 'registration_enabled'], ['value' => '1']);

        $this->actingAs($admin)
            ->patch(route('admin.settings.registration'), ['value' => '0'])
            ->assertRedirect();

        $this->assertDatabaseHas('settings', ['key' => 'registration_enabled', 'value' => '0']);
    }
}