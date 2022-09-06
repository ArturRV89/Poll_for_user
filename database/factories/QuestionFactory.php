<?php

namespace Database\Factories;

use App\Models\Poll;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $pollId = Poll::pluck('id');

        return [
            "title" => $this->faker->name(),
            "description" => $this->faker->text(30),
            'poll_id' => $this->faker->randomElement($pollId),
        ];
    }
}
