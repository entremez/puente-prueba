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
        $companies = factory(App\Company::class, 10)->create();
        $companies->each(function($company){
                $user = factory(App\User::Class)->create();
                $user->type = "Company";
                $user->type_id = $company->id;
                $user->save();
            });
    }
}
