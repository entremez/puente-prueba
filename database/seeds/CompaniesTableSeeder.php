<?php

use Illuminate\Database\Seeder;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Result::class, 5)->create();
        factory(App\Survey::class, 4)->create();
        $companies = factory(App\Company::class, 10)->create();
        $companies->each(function($company){
                $user = factory(App\User::Class)->create();
                $user->type = "Company";
                $user->type_id = $company->id;
                $user->save();
                for ($i=0; $i < rand(1,3); $i++) {
                    $company_survey = new App\CompanySurvey();
                    $company_survey->company_id = $company->id;
                    $company_survey->survey_id = rand(1,4);
                    $company_survey->result = rand(1,5);
                    $company_survey->save();
                }
            });
    }
}
