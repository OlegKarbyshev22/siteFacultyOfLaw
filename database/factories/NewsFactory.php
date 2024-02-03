<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "author" => fake()->name(),
			"email" => fake()->email(),
			"phone" => fake()->phoneNumber(),
			"title" => fake()->text(rand(12, 45)),
			"description" => fake()->text(),
			"path_image" => "28468_preobrazovannyi.png",
			"status" => "approved"
        ];
    }

	public function rejected()
	{
		$this->state(fn (array $attributes) => [
			"status" => "rejected"
		]);
	}
}
