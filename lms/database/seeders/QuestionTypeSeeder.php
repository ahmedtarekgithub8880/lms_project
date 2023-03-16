<?php

namespace Database\Seeders;

use Harishdurga\LaravelQuiz\Models\QuestionType;
use Illuminate\Database\Seeder;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = ['multiple_choice_single_answer' , 'multiple_choice_multiple_answer', 'fill_the_blank'];
        foreach ($array as $row){
            QuestionType::create(['question_type' => $row]);
        }

    }
}
