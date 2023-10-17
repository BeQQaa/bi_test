<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = json_decode(file_get_contents(database_path('factories/fixtures/users.json')), true);

        foreach ($users as $userData) {
            Factory::factoryForModel(User::class)->create($userData);
        }
    }
}
