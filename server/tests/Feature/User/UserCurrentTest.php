<?php

namespace Tests\Feature\User;

use App\Models\User;
use Database\Seeders\UserSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserCurrentTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function test_example(): void
    {
        $this->seed(UserSeeder::class);

        $user = User::factory()->create();
        $token = $user->createToken('test-token')->plainTextToken;

        $number = 1;
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
        ])->json('GET','/api/users/id/'. $number);

        $response->assertStatus(200);

        $response->assertJsonStructure([
            'id',
            'first_name',
            'last_name',
            'email',
            'role',
            'phone_number',
            'company_id'
        ]);
    }
}
