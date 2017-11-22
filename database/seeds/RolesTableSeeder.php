<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'nome_role' => 'Inspector',
            'descricao_role' => ''
        ]);

        DB::table('roles')->insert([
            'nome_role' => 'Administrador',
            'descricao_role' => ''
        ]);

        DB::table('roles')->insert([
            'nome_role' => 'Director',
            'descricao_role' => ''
        ]);

        factory(App\User::class, 5)->create();
    }
}
