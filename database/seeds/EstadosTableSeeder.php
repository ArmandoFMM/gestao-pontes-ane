<?php

use Illuminate\Database\Seeder;

class EstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Registo de Estados Padrão
        DB::table('estados')->insert([
            'designacao_estado' => 'Bom',
            'descricao_estado' => '',
        ]);

        DB::table('estados')->insert([
            'designacao_estado' => 'Degradada',
            'descricao_estado' => '',
        ]);
    }
}
