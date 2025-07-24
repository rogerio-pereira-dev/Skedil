<?php

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Str;

describe('LoginRequest', function () {
    it('gera throttleKey padrão', function () {
        $request = Mockery::mock(LoginRequest::class)->makePartial();
        $request->shouldReceive('string')->with('email')->andReturn('user@example.com');
        $request->shouldReceive('ip')->andReturn('127.0.0.1');
        $key = $request->throttleKey();
        expect($key)->toBe(Str::transliterate(Str::lower('user@example.com') . '|' . '127.0.0.1'));
    });

    it('gera throttleKey sem email', function () {
        $request = Mockery::mock(LoginRequest::class)->makePartial();
        $request->shouldReceive('string')->with('email')->andReturn('');
        $request->shouldReceive('ip')->andReturn('127.0.0.1');
        $key = $request->throttleKey();
        expect($key)->toBe(Str::transliterate('|' . '127.0.0.1'));
    });

    it('gera throttleKey só com ip', function () {
        $request = Mockery::mock(LoginRequest::class)->makePartial();
        $request->shouldReceive('string')->with('email')->andReturn(null);
        $request->shouldReceive('ip')->andReturn('127.0.0.1');
        $key = $request->throttleKey();
        expect($key)->toBe(Str::transliterate('|' . '127.0.0.1'));
    });

    it('gera throttleKey só com email', function () {
        $request = Mockery::mock(LoginRequest::class)->makePartial();
        $request->shouldReceive('string')->with('email')->andReturn('user@example.com');
        $request->shouldReceive('ip')->andReturn(null);
        $key = $request->throttleKey();
        expect($key)->toBe(Str::transliterate(Str::lower('user@example.com') . '|'));
    });
}); 