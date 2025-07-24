<?php

test('inertia middleware executes without error', function () {
    $response = $this->get('/');
    $response->assertStatus(200);
});

test('appearance middleware executes without error', function () {
    $response = $this->withCookie('appearance', 'dark')->get('/');
    $response->assertStatus(200);
}); 