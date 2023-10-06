<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Review;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Review::class;

    public function definition()
    {
        return [
            'score' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'menu_score' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'service_score' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'bill_score' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'location_score' => $this->faker->randomElement([1, 2, 3, 4, 5]),
            'date' => $this->faker->date,
            'comment' => $this->faker->sentence(rand(1,10)),
        ];
    }
}

