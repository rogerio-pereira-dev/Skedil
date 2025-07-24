<?php

test('forgot password screen can be rendered', function () {
    $response = $this->get('/forgot-password');
    $response->assertStatus(200);
});

test('forgot password requires email', function () {
    $response = $this->post('/forgot-password', []);
    $response->assertSessionHasErrors('email');
});

test('forgot password requires valid email', function () {
    $response = $this->post('/forgot-password', ['email' => 'not-an-email']);
    $response->assertSessionHasErrors('email');
});

test('forgot password sends reset link if email exists', function () {
    \Illuminate\Support\Facades\Notification::fake();
    $user = \App\Models\User::factory()->create();
    $this->post('/forgot-password', ['email' => $user->email]);
    \Illuminate\Support\Facades\Notification::assertSentTo($user, \Illuminate\Auth\Notifications\ResetPassword::class);
}); 