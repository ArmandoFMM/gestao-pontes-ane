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
            'designacao_estado' => 'Rotura',
            'descricao_estado' => 'Fora de serviço',
        ]);


        DB::table('estados')->insert([
            'designacao_estado' => 'Rotura Iminente',
            'descricao_estado' => 'Tráfego deve estar impedido até que sejam implementadas as acções correctivas',
        ]);

        DB::table('estados')->insert([
            'designacao_estado' => 'Crítico',
            'descricao_estado' => 'Degradação avançada de materiais estruturais (impedir tráfego se necessário)',
        ]);

        DB::table('estados')->insert([
            'designacao_estado' => 'Grave',
            'descricao_estado' => 'possibilidade de ocorrência de roturas localizadas',
        ]);

        DB::table('estados')->insert([
            'designacao_estado' => 'Insuficiente',
            'descricao_estado' => 'defeitos significativos em elementos estruturais',
        ]);

        DB::table('estados')->insert([
            'designacao_estado' => 'Suficiente',
            'descricao_estado' => 'Defeitos ligeiros em elementos estruturais',
        ]);

        DB::table('estados')->insert([
            'designacao_estado' => 'Satisfatório',
            'descricao_estado' => 'Alguns pequenos problemas em elementos estruturais',
        ]);

        DB::table('estados')->insert([
            'designacao_estado' => 'Bom',
            'descricao_estado' => 'apenas alguns problemas',
        ]);

        DB::table('estados')->insert([
            'designacao_estado' => 'Muito Bom',
            'descricao_estado' => 'Não são conhecidos quaisquer problemas',
        ]);
    }
}
