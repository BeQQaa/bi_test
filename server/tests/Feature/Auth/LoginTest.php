<?php

namespace Tests\Feature\Auth;

use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function user_able_login(): void
    {
        $this->seed(UserSeeder::class);

        $response = $this->postJson('api/auth', [
            "email" => "adam@gmail.com",
            "password" => "1234567",
        ]);


        $response->assertStatus(200);
        $response->assertJsonStructure(['token']);
    }
}
