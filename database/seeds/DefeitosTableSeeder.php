<?php

use Illuminate\Database\Seeder;

class DefeitosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Registo de Tipos de defeito  Padrão
        DB::table('tipo_defeitos')->insert([
            'designacao_tipo_defeito' => 'Betão Armado',
            'descricao_tipo_defeito' => '',
        ]);

        DB::table('tipo_defeitos')->insert([
            'designacao_tipo_defeito' => 'Betão pré-esforçado',
            'descricao_tipo_defeito' => '',
        ]);

        DB::table('tipo_defeitos')->insert([
            'designacao_tipo_defeito' => 'Geral',
            'descricao_tipo_defeito' => '',
        ]);

        // Registo de Defeitos Padrão

        // Betão Armado
        DB::table('defeito_graves')->insert([
            'designacao_defeito' => 'Fissuras em diagonal próximo dos apoios',
            'descricao_defeito' => '',
            'tipo_defeito_id' => 1
        ]);

        DB::table('defeito_graves')->insert([
            'designacao_defeito' => 'Armadura exposta e corroída',
            'descricao_defeito' => '',
            'tipo_defeito_id' => 1
        ]);


        DB::table('defeito_graves')->insert([
            'designacao_defeito' => 'Fissuração no meio das juntas',
            'descricao_defeito' => '',
            'tipo_defeito_id' => 1
        ]);



        // Betão pré-esforçado
        DB::table('defeito_graves')->insert([
            'designacao_defeito' => 'Fissuração de qualquer tipo, excepto fissuração mineuscula próximo da amarração dos cabos',
            'descricao_defeito' => '',
            'tipo_defeito_id' => 2
        ]);

        // Geral
        DB::table('defeito_graves')->insert([
            'designacao_defeito' => 'Assentamento das infra-estruturas',
            'descricao_defeito' => '',
            'tipo_defeito_id' => 3
        ]);

        DB::table('defeito_graves')->insert([
            'designacao_defeito' => 'Defleccão excessiva dos tabuleiros da ponte',
            'descricao_defeito' => '',
            'tipo_defeito_id' => 3
        ]);

    }
}
