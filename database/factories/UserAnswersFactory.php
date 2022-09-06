<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AnswerUser>
 */
class UserAnswersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userId = User::pluck('id');
        $questionId = Question::pluck('id');

        return [
            'answer' => $this->faker->city(),
            'user_id' => $this->faker->randomElement($userId),
            'question_id' => $this->faker->randomElement($questionId),

        ];
    }
}
