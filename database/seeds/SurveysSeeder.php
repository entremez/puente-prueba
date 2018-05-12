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
        //$question_types = factory(App\QuestionType::class, 5)->create();
        $question_type = new App\QuestionType();
        $question_type->type = "Selección múltiple";
        $question_type->description = "Es posible seleccionar varias respuestas de las opciones entregadas";
        $question_type->save();
        $question_type = new App\QuestionType();
        $question_type->type = "Selección única";
        $question_type->description = "Es posible seleccionar solo una de las opciones entregadas";
        $question_type->save();
        $question_types = App\QuestionType::all();
        $question_types->each(function($question_type){
            $questions = factory(App\Question::class, 10)->make();
            $question_type->questions()->saveMany($questions);
            $questions->each(function($question){
                $response_choises = factory(App\ResponseChoise::class, 5)->make();
                $question->response_choises()->saveMany($response_choises);
                });
        });
        factory(App\Survey::class, 1)->create();
        $surveyQuestion = new App\SurveyQuestion();
        $surveyQuestion->survey_id = 1;
        $surveyQuestion->question_id = 1;
        $surveyQuestion->order = 3;
        $surveyQuestion->save();
        $surveyQuestion = new App\SurveyQuestion();
        $surveyQuestion->survey_id = 1;
        $surveyQuestion->question_id = 15;
        $surveyQuestion->order = 2;
        $surveyQuestion->save();
        $surveyQuestion = new App\SurveyQuestion();
        $surveyQuestion->survey_id = 1;
        $surveyQuestion->question_id = 20;
        $surveyQuestion->order = 1;
        $surveyQuestion->save();
    }
}
