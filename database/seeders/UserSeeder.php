<?php

namespace Database\Seeders;

use App\Data\RegisterUserData;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Specific known user (e.g., for local login/testing)
        $data = new RegisterUserData('Allan Fernandes', 'allan2fernandes@hotmail.com', '12345678');
        User::create(array_merge($data->toArray(), ['id' => (string) Str::uuid(), 'email_verified_at' => now()]));

        // Bulk random users via factory
        collect(range(1, 20))->each(fn () => User::factory()->create(['id' => (string) Str::uuid()]));
    }
}