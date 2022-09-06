<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\OptionsQuestion;
use App\Models\Poll;
use App\Models\Question;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Poll::factory(10)->create();
        Question::factory(30)->create();
        OptionsQuestion::factory(50)->create();
    }
}
