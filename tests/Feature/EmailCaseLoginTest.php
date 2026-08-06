<?php

use App\Models\User;

/**
 * Case-insensitive email handling in the login flow.
 */
it('logs in with a mixed-case email and reaches the dashboard', function () {
    User::factory()->create([
        'email' => 'moin@example.com',
        'password' => 'secret123',
        'is_active' => true,
    ]);

    $this->post(route('login'), [
        'email' => 'Moin@Example.COM',
        'password' => 'secret123',
    ])
        ->assertRedirect(route('dashboard'));

    $this->assertAuthenticated();
});

it('logs in with an uppercase email and reaches the dashboard', function () {
    User::factory()->create([
        'email' => 'sara@example.com',
        'password' => 'secret123',
        'is_active' => true,
    ]);

    $this->post(route('login'), [
        'email' => 'SARA@EXAMPLE.COM',
        'password' => 'secret123',
    ])
        ->assertRedirect(route('dashboard'));

    $this->assertAuthenticated();
});

it('rejects a wrong password even with case variations in email', function () {
    User::factory()->create([
        'email' => 'moin@example.com',
        'password' => 'secret123',
        'is_active' => true,
    ]);

    $this->post(route('login'), [
        'email' => 'MOIN@EXAMPLE.COM',
        'password' => 'wrong-password',
    ])->assertSessionHasErrors('email');

    $this->assertGuest();
});

it('stores the email as lowercase after login regardless of input case', function () {
    User::factory()->create([
        'email' => 'sara@example.com',
        'password' => 'secret123',
        'is_active' => true,
    ]);

    $this->post(route('login'), [
        'email' => 'Sara@Example.COM',
        'password' => 'secret123',
    ])->assertRedirect(route('dashboard'));

    $this->assertDatabaseHas('users', ['email' => 'sara@example.com']);
});
