<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Factory as Faker;

class RegistrationTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function user_can_register(): void
    {
        $faker = Faker::create();

        $response = $this->putJson('api/auth/', [
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'email' => $faker->unique()->email,
            'password' => $faker->password,
            'role' => 'admin',
        ]);

        $response->assertStatus(201);
        $response->assertJsonStructure(['token']);
    }
}
