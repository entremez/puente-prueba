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
        factory(App\Survey::class, 2)->create();
        $survey = App\Survey::find(1);
        $survey->active = true;
        $survey->save();
        $question_type = new App\QuestionType();
        $question_type->type = "Selección múltiple";
        $question_type->description = "Es posible seleccionar varias respuestas de las opciones entregadas";
        $question_type->save();
        $question_type = new App\QuestionType();
        $question_type->type = "Selección única";
        $question_type->description = "Es posible seleccionar solo una de las opciones entregadas";
        $question_type->save();
        $question_type = new App\QuestionType();
        $question_type->type = "Rango";
        $question_type->description = "Se debe seleccionar entre un rango determinado";
        $question_type->save();
        $question_types = App\QuestionType::all();
        $question_types->each(function($question_type){
            $questions = factory(App\Question::class, 5)->make();
            $question_type->questions()->saveMany($questions);
            $questions->each(function($question){
                $response_choices = factory(App\ResponseChoice::class, 3)->make();
                $question->response_choices()->saveMany($response_choices);
                $question->save();
                });
        });
        $surveyQuestion = new App\SurveyQuestion();
        $surveyQuestion->survey_id = 1;
        $surveyQuestion->question_id = 1;
        $surveyQuestion->order = 3;
        $surveyQuestion->save();
        $surveyQuestion = new App\SurveyQuestion();
        $surveyQuestion->survey_id = 1;
        $surveyQuestion->question_id = 5;
        $surveyQuestion->order = 2;
        $surveyQuestion->save();
        $surveyQuestion = new App\SurveyQuestion();
        $surveyQuestion->survey_id = 1;
        $surveyQuestion->question_id = 10;
        $surveyQuestion->order = 1;
        $surveyQuestion->save();
        $surveyQuestion = new App\SurveyQuestion();
        $surveyQuestion->survey_id = 2;
        $surveyQuestion->question_id = 2;
        $surveyQuestion->order = 3;
        $surveyQuestion->save();
        $surveyQuestion = new App\SurveyQuestion();
        $surveyQuestion->survey_id = 2;
        $surveyQuestion->question_id = 7;
        $surveyQuestion->order = 2;
        $surveyQuestion->save();
        $surveyQuestion = new App\SurveyQuestion();
        $surveyQuestion->survey_id = 2;
        $surveyQuestion->question_id = 9;
        $surveyQuestion->order = 1;
        $surveyQuestion->save();

        $survey_response = new App\SurveyResponse();
        $survey_response->survey_id = App\Survey::get()->first()->id;
        $survey_response->company_id = App\Company::inRandomOrder()->get()->first()->id;
        $survey_response->save();

        $questions = App\SurveyQuestion::where('survey_id','1')->get();
        foreach ($questions as $question) {
            $response = new App\Response();
            $response->survey_response_id = $survey_response->id;
            $response->response_choice_id = App\ResponseChoice::where('question_id',$question->id)->inRandomOrder()->get()->first()->id;
            $response->save();
        }

        $survey_response = new App\SurveyResponse();
        $survey_response->survey_id = App\Survey::get()->first()->id;
        $survey_response->company_id = App\Company::inRandomOrder()->get()->first()->id;
        $survey_response->save();

        $questions = App\SurveyQuestion::where('survey_id','1')->get();
        foreach ($questions as $question) {
            $response = new App\Response();
            $response->survey_response_id = $survey_response->id;
            $response->response_choice_id = App\ResponseChoice::where('question_id',$question->id)->inRandomOrder()->get()->first()->id;
            $response->save();
        }
    }
}
