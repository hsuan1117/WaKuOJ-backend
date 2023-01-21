<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Problem>
 */
class ProblemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => $this->faker->numberBetween(0, 3),
            'title' => "題目：" . $this->faker->name,
            'description' => $this->faker->text,
            'public' => $this->faker->boolean,
        ];
    }
}
