<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         $user = User::factory()->create([
             'name' => 'Admin',
             'email' => 'admin@admin.com',
         ]);

         Skill::factory(10)->create([
             'user_id' => $user->id
         ]);
    }
}
