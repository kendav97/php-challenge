<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\AssertableJson;

class LoginTest extends TestCase
{
    public function test_login(): void
    {
        $user = new User();
        $response = $this->login($user);

        $response->assertStatus(200);

        $response->assertJson(fn (AssertableJson $json) => 
            $json->has('user', fn (AssertableJson $json) =>
                $json->where('name', $user->name)
                    ->where('email', $user->email)
                    ->etc()
            )
            ->etc()
        );
    }
}   
