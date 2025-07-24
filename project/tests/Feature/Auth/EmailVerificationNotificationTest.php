<?php

use App\Models\User;

test('redirects to dashboard if email already verified when requesting notification', function () {
    $user = User::factory()->create(['email_verified_at' => now()]);
    $response = $this->actingAs($user)->post('/email/verification-notification');
    $response->assertRedirect(route('dashboard', absolute: false));
});

test('sends email verification notification if not verified', function () {
    \Illuminate\Support\Facades\Notification::fake();
    $user = User::factory()->unverified()->create();
    $response = $this->actingAs($user)->post('/email/verification-notification');
    $response->assertSessionHas('status', 'verification-link-sent');
    \Illuminate\Support\Facades\Notification::assertSentTo($user, \Illuminate\Auth\Notifications\VerifyEmail::class);
}); 