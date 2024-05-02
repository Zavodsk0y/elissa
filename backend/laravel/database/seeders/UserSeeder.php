<?php

namespace Database\seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->unverified()->create();

        User::factory()->user()->create();

        User::factory()->employee()->create();

        User::factory()->admin()->create();
    }
}
