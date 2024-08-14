<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\Product;
use App\Models\User;
use App\Models\Student;
use App\Models\Phone;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(10)->create();
       Car::factory(10)->create();
        //Product::factory(10)->create();
        // Student::factory(10)->create();
          //Phone::factory(10)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
