<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnswerQuestion>
 */
class OptionsQuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $questionId = Question::pluck('id');

        return [
            'description' => $this->faker->text(),
            'question_id' => $this->faker->randomElement($questionId),
        ];
    }
}
