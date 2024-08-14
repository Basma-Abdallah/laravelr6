<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'name'=>fake()->randomElement(['Ahmed' , 'Mena' ,'Hossam' , 'Gamila']),
        'class'=>fake()->randomElement(['class1' , 'class2' ,'class3' , 'class4']),
        'address'=>fake()->text(),
        
        ];
    }
}
