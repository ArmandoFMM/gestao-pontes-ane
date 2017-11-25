<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Alberto Sitoe',
            'email' => 'asitoe@ane.gov.mz',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            'role_id' => 1,
            'provincia_id' => 1
        ]);


        DB::table('users')->insert([
            'name' => 'Carlos Miguel',
            'email' => 'cmiguel@ane.gov.mz',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            'role_id' => 2,
            'provincia_id' => 1
        ]);

        DB::table('users')->insert([
            'name' => 'Ana Sasibindy',
            'email' => 'asasibindy@ane.gov.mz',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
            'role_id' => 3,
            'provincia_id' => 1
        ]);


    }
}
