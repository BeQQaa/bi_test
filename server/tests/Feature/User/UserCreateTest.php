<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserCreateTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function create_user_success(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('admin')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->postJson('/api/users/', [
            "first_name" => "aaaa",
            "last_name" => "bbbbb",
            "email" => "somss@gmail.com",
            "password" => "1234567",
            "phone_number" => "null",
            "role" => "user"
        ]);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'first_name',
            'last_name',
            'email',
            'role',
            'phone_number'
        ]);
    }
}

