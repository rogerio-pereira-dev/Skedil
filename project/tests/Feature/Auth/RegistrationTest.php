<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Event;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('dashboard', absolute: false));
});

test('registration requires name', function () {
    $response = $this->post('/register', [
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);
    $response->assertSessionHasErrors('name');
});

test('registration requires email', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);
    $response->assertSessionHasErrors('email');
});

test('registration requires password', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
    ]);
    $response->assertSessionHasErrors('password');
});

test('registration requires unique email', function () {
    User::factory()->create(['email' => 'test@example.com']);
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);
    $response->assertSessionHasErrors('email');
});

test('registration requires password confirmation', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'wrong',
    ]);
    $response->assertSessionHasErrors('password');
});

test('registration requires password to meet default rules', function () {
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'weakpass@example.com',
        'password' => '123', // senha fraca
        'password_confirmation' => '123',
    ]);
    $response->assertSessionHasErrors('password');
});

test('registration dispatches Registered event', function () {
    Event::fake();
    $this->post('/register', [
        'name' => 'Test User',
        'email' => 'event@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
    ]);
    Event::assertDispatched(Registered::class);
});
