<?php

use App\Models\Setting;
use App\Models\User;

/**
 * Case-insensitive email handling in the registration flow.
 */
beforeEach(function () {
    Setting::updateOrCreate(['key' => 'registration_enabled'], ['value' => '1']);
});

it('rejects a duplicate email with different casing', function () {
    User::factory()->create(['email' => 'sara@example.com']);

    $this->post(route('register'), [
        'name' => 'Sara Mohammadi',
        'email' => 'SARA@Example.COM',
        'password' => 'secret123',
        'password_confirmation' => 'secret123',
    ])->assertSessionHasErrors('email');

    $this->assertDatabaseCount('users', 1);
});

it('stores a new email as lowercase', function () {
    $this->post(route('register'), [
        'name' => 'Sara Mohammadi',
        'email' => 'Sara@Example.COM',
        'password' => 'secret123',
        'password_confirmation' => 'secret123',
    ])->assertRedirect(route('login'));

    $this->assertDatabaseHas('users', ['email' => 'sara@example.com']);
});

it('logs in with an email registered in a different case', function () {
    $this->post(route('register'), [
        'name' => 'Sara Mohammadi',
        'email' => 'SARA@EXAMPLE.COM',
        'password' => 'secret123',
        'password_confirmation' => 'secret123',
    ])->assertRedirect(route('login'));

    $this->post(route('login'), [
        'email' => 'sara@example.com',
        'password' => 'secret123',
    ])->assertRedirect(route('dashboard'));

    $this->assertAuthenticated();
});
