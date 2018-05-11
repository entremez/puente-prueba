<?php

use Illuminate\Database\Seeder;

class SurveysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Survey::class, 1)->create();
        $question_types = factory(App\QuestionType::class, 5)->create();
        $question_types->each(function($question_type){
            $questions = factory(App\Question::class, 10)->make();
            $question_type->questions()->saveMany($questions);
            $questions->each(function($question){
                    $response_choises = factory(App\ResponseChoise::class, 5)->make();
                    $question->response_choises()->saveMany($response_choises);
                    });
        });
    }
}
