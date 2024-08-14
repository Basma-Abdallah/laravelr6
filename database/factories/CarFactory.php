<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     
     private function generateRandomImage($path)
     {
         $files = scandir($path);
         $files = array_diff($files, array('.', '..'));
         return fake()->randomElement($files);
     }
    public function definition(): array
    {
        return [
            'carTitle'=>fake()->randomElement(['BMW' , 'Mercidees' ,'fiat' , 'Audi']),
            'description'=>fake()->text(),
            'price'=>fake()->randomFloat(2),
            'published'=>fake()->numberBetween(1,0),
            'image'=>basename(fake()->image(public_path('assets/images/cars'))),
            'category_id' => fake()->numberBetween(1,2),
        ];
    }
}
