<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'document' => rand(100000000, 999999999),
            'address' => $this->faker->address,
            'phone' => rand(900000000, 999999999),
            'birthdate' => $this->faker->date,
            'height' => rand(150, 200),
            'weight' => rand(60, 100),
        ];
    }
}
