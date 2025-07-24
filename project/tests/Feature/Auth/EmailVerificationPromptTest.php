<?php

use App\Models\User;

test('redirects to dashboard if email is verified', function () {
    $user = User::factory()->create(['email_verified_at' => now()]);
    $response = $this->actingAs($user)->get('/verify-email');
    $response->assertRedirect(route('dashboard', absolute: false));
});

test('shows verify email page if not verified', function () {
    $user = User::factory()->unverified()->create();
    $response = $this->actingAs($user)->get('/verify-email');
    $response->assertStatus(200);
}); 