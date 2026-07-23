<?php

namespace Database\Seeders;

use App\Data\RegisterUserData;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = new RegisterUserData('Allan Fernandes', 'allan2fernandes@hotmail.com', '12345678');
        User::create(array_merge($data->toArray(), ['id' => (string)Str::uuid()]));
    }
}