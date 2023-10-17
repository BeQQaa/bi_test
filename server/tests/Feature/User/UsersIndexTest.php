<?php

namespace Tests\Feature\User;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UsersIndexTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function get_users_index_success(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('test-token')->plainTextToken;

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('GET', '/api/users');

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'data',
        ]);
    }
}
