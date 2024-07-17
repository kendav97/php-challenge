<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Passport\Client;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Testing\TestResponse;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase;

    protected string $token;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->artisan('passport:client --personal --name="Personal Access Client"');
        Client::create([
            'user_id' => null,
            'name' => 'Personal Access Client',
            'secret' => Str::random(40),
            'redirect' => 'http://localhost',
            'personal_access_client' => true,
            'password_client' => false,
            'revoked' => false,
        ]);
    }

    protected function login(User &$user): TestResponse
    {
        $password = 'Secure123';
        $user = User::factory(['password' => Hash::make($password)])->create();

        return $this->post('/api/v1.0/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
    }

    protected function getToken(): string
    {
        if (!empty($this->token)) {
            return $this->token;
        }
        
        $user = new User();
        return $this->login($user)->json()['token'];
    }
}
