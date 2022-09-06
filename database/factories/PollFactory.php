<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poll>
 */
class PollFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userId = User::pluck('id');

        return [
            'title' => $this->faker->name(),
            'description' => $this->faker->text(30),
            'date_start' => $this->faker->date(),
            'date_finish' => $this->faker->date(),
            'user_id' => $this->faker->randomElement($userId),

        ];
    }
}
