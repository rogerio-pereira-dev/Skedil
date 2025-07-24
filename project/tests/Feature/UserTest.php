<?php

use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function test_mass_assignment_only_fillable_fields()
    {
        $user = new User([
            'name' => 'Test',
            'email' => 'test@example.com',
            'password' => 'secret',
            'admin' => true, // não é fillable
        ]);
        $this->assertEquals('Test', $user->name);
        $this->assertEquals('test@example.com', $user->email);
        $this->assertTrue(\Illuminate\Support\Facades\Hash::check('secret', $user->password));
        $this->assertFalse(isset($user->admin));
    }

    public function test_hidden_fields_are_not_serialized()
    {
        $user = new User([
            'name' => 'Test',
            'email' => 'test@example.com',
            'password' => 'secret',
            'remember_token' => 'token',
        ]);
        $array = $user->toArray();
        $this->assertArrayNotHasKey('password', $array);
        $this->assertArrayNotHasKey('remember_token', $array);
    }
} 