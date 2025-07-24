<?php

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;

test('email verification screen can be rendered', function () {
    $user = User::factory()->unverified()->create();

    $response = $this->actingAs($user)->get('/verify-email');

    $response->assertStatus(200);
});

test('email can be verified', function () {
    $user = User::factory()->unverified()->create();

    Event::fake();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1($user->email)]
    );

    $response = $this->actingAs($user)->get($verificationUrl);

    Event::assertDispatched(Verified::class);
    expect($user->fresh()->hasVerifiedEmail())->toBeTrue();
    $response->assertRedirect(route('dashboard', absolute: false).'?verified=1');
});

test('email is not verified with invalid hash', function () {
    $user = User::factory()->unverified()->create();

    $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1('wrong-email')]
    );

    $this->actingAs($user)->get($verificationUrl);

    expect($user->fresh()->hasVerifiedEmail())->toBeFalse();
});

test('redirects to dashboard if email already verified', function () {
    $user = \App\Models\User::factory()->create([
        'email_verified_at' => now(),
    ]);
    $response = $this->actingAs($user)->get('/verify-email');
    $response->assertRedirect(route('dashboard', absolute: false));
});

test('verifies email and redirects with verified param', function () {
    $user = \App\Models\User::factory()->unverified()->create();
    $verificationUrl = \Illuminate\Support\Facades\URL::temporarySignedRoute(
        'verification.verify',
        now()->addMinutes(60),
        ['id' => $user->id, 'hash' => sha1($user->email)]
    );
    $response = $this->actingAs($user)->get($verificationUrl);
    $response->assertRedirect(route('dashboard', absolute: false) . '?verified=1');
    $this->assertTrue($user->fresh()->hasVerifiedEmail());
});
