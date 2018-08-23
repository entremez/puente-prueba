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

        //$companies = factory(App\Company::class, 10)->create();
        $users = factory(App\User::class, 10)->create();

        $users->each(function($user){
                $user->type = "Company";
                $user->save();
                $company = factory(App\Company::Class)->create();
                $company->user_id = $user->id;
                $company->save();
                $user->type_id = $company->id;
                $user->save();
            });

    }
}
