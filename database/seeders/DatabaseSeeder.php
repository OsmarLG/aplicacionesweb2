<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->create();
        \App\Models\User::factory()->survey()->create();
        \App\Models\User::factory()->osmarlg()->create();
        \App\Models\User::factory()->larzzz()->create();
        \App\Models\User::factory()->fantasticjaac()->create();
        \App\Models\User::factory()->sprinfil()->create();
    }
}
