<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->create();


        // \App\Models\Sport::factory(1)->create();
        
       
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // \App\Models\User::create([
        //     'id' => 1,
        //     'name' => 'admin',
        //     'email' => 'sportuslugi@gmail.com',
        //     'password' => hash('sha256', '12341234'),
        // ])->tokens()->create([
        //     'id' => 10005,
        //     'name' => 'api',
        //     'token' => hash('sha256', 'N7fp6GTjO9CJD1QIhqv0Ty1ZZbJeS3tFIbToFJZQ'),
        //     'abilities' => ['api-access'],
        // ]); 	

        \App\Models\Role::create([
            'id' => 1,
            'name' => 'admin',
        ]);

        \App\Models\Role::create([
            'id' => 2,
            'name' => 'user',
        ]);

        \App\Models\Role::create([
            'id' => 3,
            'name' => 'moderator',
        ]);

        \App\Models\UserRole::create([
            'id' => 1,
            'user_id' => 1,
            'role_id' => 1
        ]);

       
        // Sports
        // \App\Models\Sport::create([
        //     'name' => "Футбол",
        // ]);
        // \App\Models\Sport::create([
        //     'name' => "Воллейбол",
        // ]);

        // \App\Models\Sport::create([
        //     'name' => "Йога",
        // ]);

        // \App\Models\Sport::create([
        //     'name' => "Плавание",
        // ]);

        // \App\Models\Sport::create([
        //     'name' => "Фитнес",
        // ]);

    }
}
