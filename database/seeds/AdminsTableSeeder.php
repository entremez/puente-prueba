<?php

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = App\Admin::create([
            'name' => 'Admin'
        ]);
        App\User::create([
            'email' => 'admin@admin.com',
            'password' => bcrypt('123456'),
            'type' => 'Admin',
            'type_id' => $admin->id
        ]);
    }
}
